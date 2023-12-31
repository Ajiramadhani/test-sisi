
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('form_validation');
        $this->load->model('m_data');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //  jika usernya ada
            if ($user['status_user'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'id_jenis_user' => $user['id_jenis_user']
                    ];

                    // $this->db->insert('user_activity', $data);

                    $this->session->set_userdata($data);
                    if ($user['id_jenis_user'] == 1) {
                        $this->session->set_flashdata('flash-log', 'Login');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('flash-log', 'Login');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Wrong Password !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Email has not been Activated !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('pin', 'PIN', 'required|trim|max_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules('nomor', 'Nomor HP', 'required|trim|is_unique[user.no_hp]',
            [
                'is_unique' => 'This phone number has already registered!'
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $username = $this->input->post('username', true);
            $nomor = $this->input->post('nomor', true);
            $pin = $this->input->post('pin', true);
            $time = date('Y-m-d H:i:s');
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'username' => $username,
                'no_hp' => $nomor,
                'pin' => $pin,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_jenis_user' => 2,
                'status_user' => 1,
                'created_at' => $time
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('flash', 'Dibuat');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_jenis_user');

        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function changepassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
