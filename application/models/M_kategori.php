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
    public function get_kategori($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_kategori')->result_array();
        }else{
            return $this->db->get_where('tbl_kategori',['id_kategori' => $id])->result_array();
        }
    }
    public function add_kategori($data)
	{
		 $this->db->insert('tbl_kategori', $data);
         return $this->db->affected_rows();
	}	
    public function add($data)
    {
        $this->db->insert('tbl_kategori', $data);
        
    }
    public function edit_kategori($data,$id)
    {
        $this->db->update('tbl_kategori',$data,['id_kategori' => $id]);
        return $this->db->affected_rows();
    }
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('tbl_kategori', $data);
        
    }
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('tbl_kategori', $data);        
    }
    public function delete_kategori($id)
    {
        $this->db->delete('tbl_kategori',['id_kategori' => $id]);
        return $this->db->affected_rows();
    }

}

/* End of file M_kategori.php */
