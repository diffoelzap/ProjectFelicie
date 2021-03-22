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

}

/* End of file ModelName.php */


?>