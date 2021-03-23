<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model {

    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->where('status_order=0');
        return $this->db->get()->result();
        
    }
    public function edit_order($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }
    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->where('status_order=1');
        return $this->db->get()->result();
    }
    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->where('status_order=2');
        return $this->db->get()->result();
    }
    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->where('status_order=3');
        return $this->db->get()->result();
    }
}

/* End of file M_pesanan_masuk.php */

?>