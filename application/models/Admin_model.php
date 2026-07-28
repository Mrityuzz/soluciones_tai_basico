<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    
    public function validar_admin($login_input, $password) {
        $this->db->where('correo', $login_input);
        $this->db->or_where('username', $login_input);
        $query = $this->db->get('admins');
        $admin = $query->row();

        if ($admin && password_verify($password, $admin->password)) {
            return $admin; 
        }
        return false; 
    }

    
    public function get_admin($id_admin) {
        $query = $this->db->get_where('admins', array('id_admin' => $id_admin));
        return $query->row();
    }

    
    public function cambiar_password($id_admin, $new_password_hash) {
        $this->db->where('id_admin', $id_admin);
        return $this->db->update('admins', array('password' => $new_password_hash));
    }

    
    public function registrar_admin($data) {
        return $this->db->insert('admins', $data);
    }

    
    public function eliminar_usuario($id_admin) {
        return $this->db->delete('admins', array('id_admin' => $id_admin));
    }
}
