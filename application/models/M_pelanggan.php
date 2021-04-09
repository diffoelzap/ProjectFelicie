<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
        
    }
    public function get_all_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
        
    }    
    public function get_pelanggan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_pelanggan')->result_array();
        }else{
            return $this->db->get_where('tbl_pelanggan',['id_pelanggan' => $id])->result_array();
        }
    }
    public function add_pelanggan($data)
	{
		 $this->db->insert('tbl_pelanggan', $data);
         return $this->db->affected_rows();
	}
    public function edit_pelanggan($data,$id)
    {
        $this->db->update('tbl_pelanggan',$data,['id_pelanggan' => $id]);
        return $this->db->affected_rows();
    }
    public function delete_pelanggan($id)
    {
        $this->db->delete('tbl_pelanggan',['id_pelanggan' => $id]);
        return $this->db->affected_rows();
    }
    public function total_pelanggan()
    {
        return $this->db->get('tbl_pelanggan')->num_rows();
    }
    

}

/* End of file ModelName.php */

?>