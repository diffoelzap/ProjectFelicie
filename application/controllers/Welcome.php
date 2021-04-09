<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_obat');
	}
	public function index()
	{	
		  $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus diisi !!!'                
	      ));
	      $this->form_validation->set_rules('password', 'Password', 'required', array(
	            'required' => '%s Harus diisi !!!'                
	      ));

		
        if ($this->form_validation->run() == TRUE) {
            
            $username = $this->input->post('username');
            $cek = $this->m_obat1301208570->get_user($username);
            if($cek)
	        {   
	            //jika benar

				$this->load->helper('url');
				$_SESSION['user'] = $user->username;
				$this->load->view('welcome_message');
				$this->load->database();

				redirect('obat');
	         }else{
	            //jika salah
	            $this->session->set_flashdata('error','Username atau Password Salah');
	            //redirect ke login
	            redirect('welcome');
	            
	         }
        }else{

			$data = array('judul' => 'Halaman Login');
			$this->load->view('v_login', $data, FALSE);
        } 

	}
}
