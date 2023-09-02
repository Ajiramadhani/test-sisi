<?php
defined('BASEPATH') or exit();

class My_model extends CI_Model
{
    function ambildata($table)
    {
        return $this->db->get($table);
    }

    function tambahdata($tabel,$data)
    {
        $this->db->insert($tabel, $data);
    }

    function ambilId($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function updatedata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapusdata($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function simpan_upload($nama_produk, $volume, $satuan, $kategori_produk, $image)
    {
        $data = array(
            'nama_produk' => $nama_produk,
            'volume' => $volume,
            'satuan' => $satuan,
            'kategori_produk' => $kategori_produk,
            'gambar' => $image
        );
        $result = $this->db->insert('produk', $data);
        return $result;
    }
}
