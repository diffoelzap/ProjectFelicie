<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
        
    }   
    
    public function get_data($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
        
    }
    public function get_barang($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_barang')->result_array();
        }else{
            return $this->db->get_where('tbl_barang',['id_barang' => $id])->result_array();
        }
    }
    public function add_barang($data)
	{
		 $this->db->insert('tbl_barang', $data);
         return $this->db->affected_rows();
	}	
    public function add($data)
    {
        $this->db->insert('tbl_barang', $data);
        
    }
    public function edit_barang($data,$id)
    {
        $this->db->update('tbl_barang',$data,['id_barang' => $id]);
        return $this->db->affected_rows();
    }
    public function edit($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('tbl_barang', $data);
        
    }
    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tbl_barang', $data);        
    }
    public function delete_barang($id)
    {
        $this->db->delete('tbl_barang',['id_barang' => $id]);
        return $this->db->affected_rows();
    }

}

/* End of file M_barang.php */
