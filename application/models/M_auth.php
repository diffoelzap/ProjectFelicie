<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model 
{
    
    public function login_user($username,$password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where(array('username' => $username,
                               'password' => $password 
                              ));
        return $this->db->get()->row();
        
    }

}

/* End of file M_auth.php */
