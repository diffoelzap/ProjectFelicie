<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'isi'   => 'v_home');
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

}

/* End of file Home.php */
