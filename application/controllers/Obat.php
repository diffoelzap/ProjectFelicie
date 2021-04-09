<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_obat');
	}

	public function index()
	{
		$data = array('judul' => 'Halaman Data Obat',
					  'obat' => $this->m_obat1301208570->get_all());

		$this->load->view('v_data_obat', $data, FALSE);
	}
	public function add()
	{
		$data = array('judul' => 'Halaman Tambah Obat' );
		$this->load->view('v_tambah_obat', $data, FALSE);
	}

	public function tambah_obat()
	{	

		$data = array('kode_obat' => $this->input->post('kode_obat'),
						   'nama_obat' => $this->input->post('nama_obat'),
						   'deskripsi_obat' => $this->input->post('deskripsi_obat'),
						   'tipe_obat' => $this->input->post('tipe_obat'),
						   'jumlah' => $this->input->post('jumlah'),
						   'harga_satuan' => $this->input->post('harga_satuan')
						   );
		$this->m_obat->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
                    
        redirect('obat');
	}

	public function hapus($id_obat = null)
	{
		$data = array('id_obat' => $id_obat);
        $this->m_obat->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('obat');
	}

	public function edit_obat($id_obat = null)
	{

		
		/*
			$data = array('id_obat'   => $id_obat,
                      'nama_obat' => $this->input->post('nama_obat'),
				      'deskripsi_obat' => $this->input->post('deskripsi_obat'),
				      'tipe_obat' => $this->input->post('tipe_obat'),
					  'jumlah' => $this->input->post('jumlah'),
					  'harga_satuan' => $this->input->post('harga_satuan'),
					  );

                    $this->m_obat->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
         redirect('obat');*/

		$array = array(
                    'judul'           => 'Edit Obat',
                    'obat'          =>  $this->m_obat->get_data($id_obat),
                    'data'			=> $this->m_obat->get_all()
            );
		
		$this->load->view('v_edit_obat', $array, FALSE);
	}
	public function edit($id_obat = null){

		$data = array('id_obat'   => $id_obat,
                      'nama_obat' => $this->input->post('nama_obat'),
				      'deskripsi_obat' => $this->input->post('deskripsi_obat'),
				      'tipe_obat' => $this->input->post('tipe_obat'),
					  'jumlah' => $this->input->post('jumlah'),
					  'harga_satuan' => $this->input->post('harga_satuan'),
					  );

                    $this->m_obat->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
         redirect('obat');
	}

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */