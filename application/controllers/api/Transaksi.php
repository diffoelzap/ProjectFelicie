	<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Transaksi extends Rest_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_transaksi');
	}
	public function index_get()
	{
		$id = $this->get('id_transaksi');

		if ($id === null) {
			$transaksi = $this->m_transaksi->get_transaksi();
		}else{

			$transaksi = $this->m_transaksi->get_transaksi($id);
		}
		
		if ($transaksi) {
			$this->response([
				'status' => true,
				'data' => $transaksi
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
		$id = $this->delete('id_transaksi');

		if ($id === null) {
			$this->response([
				'status' => false,
				'data' => 'provide an id'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->m_transaksi->delete_transaksi($id) > 0) {
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
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'no_order' => $this->input->post('no_order'),
			'tgl_order' => $this->input->post('tgl_order'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'hp_penerima' => $this->input->post('hp_penerima'),
			'provinsi' => $this->input->post('provinsi'),
			'kota' => $this->input->post('kota'),
			'alamat' => $this->input->post('alamat'),
			'kode_pos' => $this->input->post('kode_Pos'),
			'ekspedisi' => $this->input->post('ekspedisi'),
			'paket' => $this->input->post('paket'),
			'estimasi' => $this->input->post('estimasi'),
			'ongkir' => $this->input->post('ongkir'),
			'grand_total' => $this->input->post('grand_total'),
			'total_bayar' => $this->input->post('total_bayar'),
			'status_bayar' => $this->input->post('status_bayar'),
			'bukti_bayar' => $this->input->post('bukti_bayar'),
			'atas_nama' => $this->input->post('atas_nama'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rek' => $this->input->post('no_rek'),
			'status_order' => $this->input->post('status_order'),
			'no_resi' => $this->input->post('no_resi'),
			'keterangan' => $this->input->post('keterangan'),
		];

		if ($this->m_transaksi->add_transaksi($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new transaksi has been created'
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
		$id = $this->put('id_transaksi');

		$data = [	
			'id_pelanggan' => $this->put('id_pelanggan'),
			'no_order' => $this->put('no_order'),
			'tgl_order' => $this->put('tgl_order'),
			'nama_penerima' => $this->put('nama_penerima'),
			'hp_penerima' => $this->put('hp_penerima'),
			'provinsi' => $this->put('provinsi'),
			'kota' => $this->put('kota'),
			'alamat' => $this->put('alamat'),
			'kode_pos' => $this->put('kode_Pos'),
			'ekspedisi' => $this->put('ekspedisi'),
			'paket' => $this->put('paket'),
			'estimasi' => $this->put('estimasi'),
			'ongkir' => $this->put('ongkir'),
			'grand_total' => $this->put('grand_total'),
			'total_bayar' => $this->put('total_bayar'),
			'status_bayar' => $this->put('status_bayar'),
			'bukti_bayar' => $this->put('bukti_bayar'),
			'atas_nama' => $this->put('atas_nama'),
			'nama_bank' => $this->put('nama_bank'),
			'no_rek' => $this->put('no_rek'),
			'status_order' => $this->put('status_order'),
			'no_resi' => $this->put('no_resi'),
			'keterangan' => $this->put('keterangan'),
		];

		if ($this->m_transaksi->edit_transaksi($data,$id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new transaksi has been updated'
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