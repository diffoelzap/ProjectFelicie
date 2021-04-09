<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
        
    }
    public function get_transaksi($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_transaksi')->result_array();
        }else{
            return $this->db->get_where('tbl_transaksi',['id_transaksi' => $id])->result_array();
        }
    }
    public function edit_transaksi($data,$id)
    {
        $this->db->update('tbl_transaksi',$data,['id_transaksi' => $id]);
        return $this->db->affected_rows();
    }
    public function add_transaksi($data)
	{
		 $this->db->insert('tbl_transaksi', $data);
         return $this->db->affected_rows();
	}
    public function delete_transaksi($id)
    {
        $this->db->delete('tbl_transaksi',['id_transaksi' => $id]);
        return $this->db->affected_rows();
    }	


    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tbl_rinci_transaksi', $data_rinci);
        
    }
    public function get_rinci_transaksi($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_rinci_transaksi')->result_array();
        }else{
            return $this->db->get_where('tbl_rinci_transaksi',['id_rinci' => $id])->result_array();
        }
    }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }
    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }
    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }
    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
        
    }
    public function rekening(){
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        return $this->db->get()->result();
    
    }
    public function upload_bukti_bayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }

}

/* End of file ModelName.php */


?>