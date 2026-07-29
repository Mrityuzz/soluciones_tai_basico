<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('session');

        // Validar que haya sesión de usuario
        if (!$this->session->userdata('us_id')) {
            redirect('login');
        }
    }

    // Mostrar perfil del usuario logueado
    public function perfil() {
        $id = $this->session->userdata('us_id');

        // Obtener datos del usuario
        $usuario = $this->Usuario_model->get_usuario($id);

        // Pasar datos a la vista
        $data['usuario'] = $usuario;
        $data['msg'] = $this->session->flashdata('msg');
        $data['title'] = 'Mi Perfil';

        
        $this->load->view('layout/header_usuario', $data);
        $this->load->view('usuario/perfil', $data);
        $this->load->view('layout/footer_usuario');
    }

    // Actualizar datos del perfil
    public function actualizar() {
        $id = $this->session->userdata('us_id');
        $data = array(
            'us_nombre'   => $this->input->post('nombre'),
            'us_apellidos'=> $this->input->post('apellidos'),
            'us_correo'   => $this->input->post('correo'),
            'us_telefono' => $this->input->post('telefono')
        );

        // Si el usuario quiere cambiar contraseña
        if ($this->input->post('password')) {
            $data['us_password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        $this->Usuario_model->actualizar($id, $data);
        $this->session->set_flashdata('msg', 'Perfil actualizado correctamente');
        redirect('usuario/perfil');
    }
}
