<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Rekening extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_transaksi');
	}
	public function index_get()
	{
		$id = $this->get('id_rekening');

		if ($id === null) {
			$rekening = $this->m_transaksi->rekening();
		}else{

			$rekening = $this->m_transaksi->rekening($id);
		}
		
		if ($rekening) {
			$this->response([
				'status' => true,
				'data' => $rekening
			],Rest_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'data' => 'id not found!'
			],Rest_Controller::HTTP_NOT_FOUND);
		}
	}
}
?>