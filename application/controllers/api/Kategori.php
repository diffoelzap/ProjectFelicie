<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Kategori extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_kategori');
	}
	public function index_get()
	{
		$id = $this->get('id_kategori');

		if ($id === null) {
			$kategori = $this->m_kategori->get_kategori();
		}else{

			$kategori = $this->m_kategori->get_kategori($id);
		}
		
		if ($kategori) {
			$this->response([
				'status' => true,
				'data' => $kategori
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
		$id = $this->delete('id_kategori');

		if ($id === null) {
			$this->response([
				'status' => false,
				'data' => 'provide an id'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->m_kategori->delete_kategori($id) > 0) {
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
			'nama_kategori' => $this->input->post('nama_kategori')
		];

		if ($this->m_kategori->add_kategori($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new kategori has been created'
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
		$id = $this->put('id_kategori');

		$data = [	
			'nama_kategori' => $this->put('nama_kategori')
		];

		if ($this->m_kategori->edit_kategori($data,$id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new kategori has been updated'
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