<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_kategori');
        

    }

    // List all your items
    public function index()
    {
        $data = array(
            'title'    => 'Kategori',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi'      => 'v_kategori');
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {

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

/* End of file Kategori.php */


