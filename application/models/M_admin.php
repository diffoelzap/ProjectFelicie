<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model 
{
    public function total_barang()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('tbl_kategori')->num_rows();
    }
    public function total_user()
    {
        $this->db->select('level_user');
        $this->db->from('tbl_user');
        $this->db->where('level_user', 2);
        return $this->db->get()->num_rows();
        
    }
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id_setting', 1);
        return $this->db->get()->row();
        
    }
    public function edit($data)
    {
        $this->db->where('id_setting', $data['id_setting']);
        $this->db->update('tbl_setting', $data);
        
    }
}