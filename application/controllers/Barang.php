<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
        
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title'  => 'Barang',
            'barang' => $this->m_barang->get_all_data(),
            'isi'    => 'barang/v_barang'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'title'    => 'Tambah Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi'      => 'barang/v_tambah'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Barang.php */

