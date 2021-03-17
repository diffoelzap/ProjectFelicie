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
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required',
            array('required' => '%s Harus diisi'));
        
        $this->form_validation->set_rules('id_kategori', 'Nama kategori', 'required',
            array('required' => '%s Harus diisi'));
        
        $this->form_validation->set_rules('harga', 'Harga barang', 'required',
            array('required' => '%s Harus diisi'));    
            
        $this->form_validation->set_rules('deskripsi', 'Deskripsi barang', 'required',
            array('required' => '%s Harus diisi'));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';

            // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
            $this->upload->initialize($config);
            $field_name = "gambar";
            if(!$this->upload->do_upload($field_name)){
                $data = array(
                    'title'           => 'Tambah Barang',
                    'kategori'        => $this->m_kategori->get_all_data(),
                    'error_upload'    => $this->upload->display_errors(),  
                    'isi'             => 'barang/v_tambah'
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);        
            }else{
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib',$config);
                
                $data = array('nama_barang' => $this->input->post('nama_barang'),
                              'id_kategori' => $this->input->post('id_kategori'),
                              'harga'       => $this->input->post('harga'),
                              'deskripsi'   => $this->input->post('deskripsi'),
                              'gambar'      => $upload_data['uploads']['file_name'],
                                    
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
                
                redirect('barang');
                
            }
        } 

        $data = array(
            'title'    => 'Tambah Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi'      => 'barang/v_tambah'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function detail($id_barang = NULL)
    {
        $data = array(
            'title'    => 'Detail Barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'isi'      => 'barang/v_detail'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit( $id_barang = NULL )
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required',
            array('required' => '%s Harus diisi'));
        
        $this->form_validation->set_rules('id_kategori', 'Nama kategori', 'required',
            array('required' => '%s Harus diisi'));
        
        $this->form_validation->set_rules('harga', 'Harga barang', 'required',
            array('required' => '%s Harus diisi'));    
            
        $this->form_validation->set_rules('deskripsi', 'Deskripsi barang', 'required',
            array('required' => '%s Harus diisi'));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';

            // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
            $this->upload->initialize($config);
            $field_name = "gambar";
            if(!$this->upload->do_upload($field_name)){
                $data = array(
                    'title'           => 'Edit Barang',
                    'kategori'        => $this->m_kategori->get_all_data(),
                    'barang'          => $this->m_barang->get_data($id_barang),
                    'error_upload'    => $this->upload->display_errors(),  
                    'isi'             => 'barang/v_edit'
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);        
            }else{
                //hapus gambar
                $barang = $this->m_barang->get_data($id_barang);
                
                if($barang->gambar != ""){
                    unlink('./assets/gambar/'. $barang->gambar);
                }
                //end hapus gambar
                
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib',$config);
                
                $data = array('id_barang'   => $id_barang,
                              'nama_barang' => $this->input->post('nama_barang'),
                              'id_kategori' => $this->input->post('id_kategori'),
                              'harga'       => $this->input->post('harga'),
                              'deskripsi'   => $this->input->post('deskripsi'),
                              'gambar'      => $upload_data['uploads']['file_name'],
                                    
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil diedit');
                
                redirect('barang');
                
            }
            //jika tanpa ganti gambar
            $data = array('id_barang'   => $id_barang,
                              'nama_barang' => $this->input->post('nama_barang'),
                              'id_kategori' => $this->input->post('id_kategori'),
                              'harga'       => $this->input->post('harga'),
                              'deskripsi'   => $this->input->post('deskripsi')
                                    
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil diedit');
                
                redirect('barang');
        } 

        $data = array(
            'title'    => 'Edit Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'barang'   => $this->m_barang->get_data($id_barang),
            'isi'      => 'barang/v_edit'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete( $id_barang = NULL )
    {
        //hapus gambar
        $barang = $this->m_barang->get_data($id_barang);
        
        if($barang->gambar != ""){
            unlink('./assets/gambar/'. $barang->gambar);
        }
        //end hapus gambar
        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
                    redirect('barang');
    }
}

/* End of file Barang.php */

