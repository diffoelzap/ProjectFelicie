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

}

/* End of file M_pesanan_masuk.php */

?>