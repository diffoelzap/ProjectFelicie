<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        
        
    }
    
    public function index()
    {
        $data = array(
            'title'        => 'Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'total_kategori' =>  $this->m_admin->total_kategori(),
            'total_user' => $this->m_admin->total_user(),
            'isi'          => 'v_admin');
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function setting()
    {
           
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required',
            array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('kota', 'Kota', 'required',
            array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required',
            array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('no_telpon', 'Nombor Telpon', 'required',
            array('required' => '%s Harus diisi'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'        => 'Pengaturan Admin',
                'setting'      => $this->m_admin->data_setting(),
                'isi'          => 'v_setting'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }else{
            $data = array('id_setting'   => 1,
                          'lokasi_toko' => $this->input->post('kota'),
                          'nama_toko'   => $this->input->post('nama_toko'),
                          'alamat_toko' => $this->input->post('alamat_toko'),
                          'no_telpon' =>   $this->input->post('no_telpon'
                           ));
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Pengaturan berhasil diganti');
            redirect('admin/setting');
        }
    }
    public function pesanan_masuk()
    {
        $data = array(
            'title'        => 'Pesanan Masuk',
            'pesanan'      => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim'  => $this->m_pesanan_masuk->pesanan_dikirim(),
            'isi'          => 'v_pesanan_masuk');
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function proses($id_transaksi)
    {
        $data = array('id_transaksi' => $id_transaksi,
                      'status_order' => '1' 
                      );
                      $this->m_pesanan_masuk->edit_order($data);
                      $this->session->set_flashdata('pesan', 'Pesanan Berhasil DiProses / DiKemas');
                      
                      redirect('admin/pesanan_masuk','refresh');
                      
    }
    public function kirim($id_transaksi)
    {
        $data = array('id_transaksi' => $id_transaksi,
                      'no_resi'      => $this->input->post('no_resi'),
                      'status_order' => '2' 
                      );
                      $this->m_pesanan_masuk->edit_order($data);
                      $this->session->set_flashdata('pesan', 'Pesanan Berhasil DiKirim');
                      
                      redirect('admin/pesanan_masuk','refresh');
                      
    }


}

/* End of file Home.php */
