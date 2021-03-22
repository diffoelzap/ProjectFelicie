<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
        
    }
    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tbl_rinci_transaksi', $data_rinci);
        
    }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar=0');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }

}

/* End of file ModelName.php */


?>