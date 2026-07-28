<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    
    public function index() {
        $this->load->view('registro_view');
    }

    
    public function registrar() {
        $correo   = $this->input->post('correo');
        $password = $this->input->post('password');
        $rol      = $this->input->post('rol'); 

        
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'correo'   => $correo,
            'password' => $hash,
            'rol'      => $rol
        );

        
        if ($this->db->insert('admins', $data)) {
            $this->session->set_flashdata('msg', 'Administrador registrado correctamente');
            redirect('login');
        } else {
            $this->session->set_flashdata('msg', 'Error al registrar administrador');
            redirect('registro');
        }
    }
}
