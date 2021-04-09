	<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Pelanggan extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_pelanggan');
	}
	public function index_get()
	{
		$id = $this->get('id_pelanggan');

		if ($id === null) {
			$pelanggan = $this->m_pelanggan->get_pelanggan();
		}else{

			$pelanggan = $this->m_pelanggan->get_pelanggan($id);
		}
		
		if ($pelanggan) {
			$this->response([
				'status' => true,
				'data' => $pelanggan
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
		$id = $this->delete('id_pelanggan');

		if ($id === null) {
			$this->response([
				'status' => false,
				'data' => 'provide an id'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->m_pelanggan->delete_pelanggan($id) > 0) {
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
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'gender' => $this->input->post('gender'),
			'umur' => $this->input->post('umur'),
			'foto' => $this->input->post('foto'),
		];

		if ($this->m_pelanggan->add_pelanggan($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new pelanggan has been created'
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
		$id = $this->put('id_pelanggan');

		$data = [	
			'nama_pelanggan' => $this->put('nama_pelanggan'),
			'email' => $this->put('email'),
			'password' => $this->put('password'),
			'gender' => $this->put('gender'),
			'umur' => $this->put('umur'),
			'foto' => $this->put('foto'),
		];

		if ($this->m_pelanggan->edit_pelanggan($data,$id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new pelanggan has been updated'
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