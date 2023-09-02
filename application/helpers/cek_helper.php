<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id =  $ci->session->userdata('id_jenis_user');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('menu_level', ['level' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('menu_user', ['menu_id' => $menu_id]);
        $sub_menu = $ci->db->get_where('menu', [
            'id_level' => $role_id,
            'menu_name',
            'menu_link'
        ]);
        if ($userAccess->num_rows() < 1) {
            if ($sub_menu !== 1) {
                redirect('auth/blocked');
            }
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('id_user', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('menu_user');


    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function blocking()
{
    
}
