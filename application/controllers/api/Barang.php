	<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Barang extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_barang');
	}
	public function index_get()
	{
		$id = $this->get('id_barang');

		if ($id === null) {
			$barang = $this->m_barang->get_barang();
		}else{

			$barang = $this->m_barang->get_barang($id);
		}
		
		if ($barang) {
			$this->response([
				'status' => true,
				'data' => $barang
			],Rest_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'data' => 'id not found!'
			],Rest_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_delete()
	{
		$id = $this->delete('id_barang');

		if ($id === null) {
			$this->response([
				'status' => false,
				'data' => 'provide an id'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->m_barang->delete_barang($id) > 0) {
				//ok
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted'
				],Rest_Controller::HTTP_NO_CONTENT);
			}else{
				//id not found
				$this->response([
					'status' => false,
					'data' => 'id not found!'
				],Rest_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	public function index_post()
	{
		$data = [
			'nama_barang' => $this->input->post('nama_barang'),
			'id_kategori' => $this->input->post('id_kategori'),
			'harga' => $this->input->post('harga'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $this->input->post('gambar')
		];

		if ($this->m_barang->add_barang($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new barang has been created'
			],Rest_Controller::HTTP_CREATED);
		}else{
			$this->response([
					'status' => false,
					'message' => 'failed created'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id = $this->put('id_barang');

		$data = [
			'nama_barang' => $this->put('nama_barang'),
			'id_kategori' => $this->put('id_kategori'),
			'harga' => $this->put('harga'),
			'deskripsi' => $this->put('deskripsi'),
			'gambar' => $this->put('gambar')	
			
		];

		if ($this->m_barang->edit_barang($data,$id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new barang has been updated'
			],Rest_Controller::HTTP_NO_CONTENT);
		}else{
			$this->response([
					'status' => false,
					'message' => 'failed updated'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}
	}
}
?>