<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
        
    }    
    

}

/* End of file M_kategori.php */
