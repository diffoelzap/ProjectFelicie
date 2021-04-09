<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        
    }
    
    public function index()
    {
        $data = array(
            'title'  => 'Pesanan Saya',
            'pesanan'      => $this->m_pesanan_masuk->pesanan(),
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            'isi'    => 'v_pesanan_saya');
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required',
        array('required' => '%s Harus diisi'));
    
    if ($this->form_validation->run() == TRUE) {
        $config['upload_path'] = './assets/bukti_bayar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size']     = '2000';

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);
        $field_name = 'bukti_bayar';
        if(!$this->upload->do_upload($field_name)){
            $data = array(
                'title'  => 'Pembayaran',
                'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                'rekening' => $this->m_transaksi->rekening(),
                'error_upload'    => $this->upload->display_errors(),  
                'isi'    => 'v_bayar'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);       
        }else{
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib',$config);
            
            $data = array('id_transaksi' => $id_transaksi,
                          'atas_nama' => $this->input->post('atas_nama'),
                          'nama_bank' => $this->input->post('nama_bank'),
                          'no_rek'   => $this->input->post('no_rek'),
                          'status_bayar'   => '1',
                          'bukti_bayar'      => $upload_data['uploads']['file_name'],
                                
            );
            $this->m_transaksi->upload_bukti_bayar($data);
            $this->session->set_flashdata('pesan', 'Bukti Pembayaran berhasil diupload');
            
            redirect('pesanan_saya');
            
            }
        } 

        $data = array(
            'title'  => 'Pembayaran',
            'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->m_transaksi->rekening(),
            'isi'    => 'v_bayar'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function edit_bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required',
        array('required' => '%s Harus diisi'));
    
    if ($this->form_validation->run() == TRUE) {
        $config['upload_path'] = './assets/bukti_bayar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size']     = '2000';

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);
        $field_name = 'bukti_bayar';
        if(!$this->upload->do_upload($field_name)){
            $data = array(
                'title'  => 'Pembayaran',
                'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                'rekening' => $this->m_transaksi->rekening(),
                'error_upload'    => $this->upload->display_errors(),  
                'isi'    => 'v_bayar'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);       
        }else{
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib',$config);
            
            $data = array('id_transaksi' => $id_transaksi,
                          'atas_nama' => $this->input->post('atas_nama'),
                          'nama_bank' => $this->input->post('nama_bank'),
                          'no_rek'   => $this->input->post('no_rek'),
                          'status_bayar'   => '1',
                          'bukti_bayar'      => $upload_data['uploads']['file_name'],
                                
            );
            $this->m_transaksi->upload_bukti_bayar($data);
            $this->session->set_flashdata('pesan', 'Edit Bukti Pembayaran berhasil diupload');
            
            redirect('pesanan_saya');
            
            }
        } 
        $data = array('id_transaksi' => $id_transaksi,
                      'title' => 'Halaman Edit Pembayaran',
                      'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                      'rekening' => $this->m_transaksi->rekening(),
                      'isi'  => 'v_edit_bayar');
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);       
    }
    public function diterima($id_transaksi)
    {
        $data = array('id_transaksi' => $id_transaksi,
                      'status_order' => '3' 
        );
        $this->m_pesanan_masuk->edit_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan telah diterima');
        
        redirect('pesanan_saya','refresh');
    }

}

/* End of file Pesanan_saya.php */

?>