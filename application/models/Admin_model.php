<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    public function validar_admin($correo, $password) {
        $query = $this->db->get_where('admins', array('correo' => $correo));
        $admin = $query->row();

        if ($admin && password_verify($password, $admin->password)) {
            return $admin; 
        }
        return false; 
    }
}
