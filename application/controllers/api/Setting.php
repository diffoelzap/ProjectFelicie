<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Setting extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_admin');
	}
	public function index_get()
	{
		$id = $this->get('id_setting');

		if ($id === null) {
			$setting = $this->m_admin->data_setting();
		}else{

			$setting = $this->m_admin->data_setting($id);
		}
		
		if ($setting) {
			$this->response([
				'status' => true,
				'data' => $setting
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