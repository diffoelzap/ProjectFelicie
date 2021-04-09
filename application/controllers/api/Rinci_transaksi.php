<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Rinci_transaksi extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_transaksi');
	}
	public function index_get()
	{
		$id = $this->get('id_rinci');

		if ($id === null) {
			$rinci = $this->m_transaksi->get_rinci_transaksi();
		}else{

			$rinci = $this->m_transaksi->get_rinci_transaksi($id);
		}
		
		if ($rinci) {
			$this->response([
				'status' => true,
				'data' => $rinci
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