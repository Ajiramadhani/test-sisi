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
                # code...
            }
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    // $result = $ci->db->get_where('user_access_menu', [
    //     'role_id' => $role_id,
    //     'menu_id' => $menu_id
    // ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function blocking()
{
    // $ci = get_instance();
    // $sub_menu = $ci->db->get_where('user_sub_menu', [
    //     'menu_id',
    //     'url',
    //     'is_active'
    // ]);
    // if ($sub_menu !== 0) {
    //     redirect('auth/blocked');
    // }
    // $sub_menu = $ci->db->get('user_sub_menu')->row_array();
    // $url = $sub_menu['url'];
    // if (!cek_login()) {
    //     redirect('');
    // } else {
    // }

    //     $role_id = $ci->session->userdata('role_id');
    // $menu = $ci->uri->segment(1 && 2);

    //     $aktif = $ci->db->get('user_sub_menu', ['is_active' == 1]);
    //     // $aktif = $ci->db->get('user_sub_menu')->result();

    //     if ($aktif->num_rows() != 1) {
    //     } else {
    //         // $menu = $ci->uri->segment(1);
    //         // $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    //         // $menu_id = $queryMenu['id'];
    //         // $aktif = $ci->db->get_where('user_sub_menu', [
    //         //     'menu_id' => $menu_id
    //         // ])->row_array();
    //     }
}
