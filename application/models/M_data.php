<?php

// Model yang terstruktur. agar bisa digunakan berulang kali untuk membuat CRUD. 
// Sehingga proses pembuatan CRUD menjadi lebih cepat dan efisien.

class M_data extends CI_Model
{

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	// FUNGSI CRUD
	// fungsi untuk mengambil data dari database
	function get_data($table)
	{
		return $this->db->get($table);
	}

	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	// fungsi untuk mengedit data
	function edit_data($table, $where)
	{
		return $this->db->get_where($where, $table);
	}

	// fungsi untuk crawling data
	function craw_data($table, $where)
	{
		return $this->db->get_where($table, $where)->result_array();
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	function tambah($data, $table)
	{
		$this->db->insert($table, $data);
	}


	// AKHIR FUNGSI CRUD

}
