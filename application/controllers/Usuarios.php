<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('session'); 
    }

    // Mostrar lista de usuarios
    public function index() {
        $data['usuarios'] = $this->Usuario_model->obtener_todos();
        $data['msg'] = $this->session->flashdata('msg'); 
        $this->load->view('usuarios_view', $data);
    }

    // Agregar usuario con validación
    public function agregar() {
        $data = array(
            'us_nombre'   => $this->input->post('nombre'),
            'us_apellidos'=> $this->input->post('apellidos'),
            'us_correo'   => $this->input->post('correo'),
            'us_telefono' => $this->input->post('telefono')
        );

        if ($this->Usuario_model->insertar($data)) {
            $this->session->set_flashdata('msg', ' Usuario agregado correctamente');
        } else {
            $this->session->set_flashdata('msg', ' Error: el correo ya existe');
        }

        redirect('usuarios');
    }

    // Mostrar formulario de nuevo usuario
    public function nuevo() {
    $this->load->view('agregar_view');
    
    }   


    // Borrar usuario
    public function borrar($id) {
        $this->Usuario_model->borrar($id);
        $this->session->set_flashdata('msg', ' Usuario eliminado');
        redirect('usuarios');
    }

    // Editar usuario
    public function editar($id) {
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        $this->load->view('editar_view', $data);
    }

    // Actualizar usuario
    public function actualizar($id) {
        $data = array(
            'us_nombre'   => $this->input->post('nombre'),
            'us_apellidos'=> $this->input->post('apellidos'),
            'us_correo'   => $this->input->post('correo'),
            'us_telefono' => $this->input->post('telefono')
        );

        $this->Usuario_model->actualizar($id, $data);
        $this->session->set_flashdata('msg', ' Usuario actualizado');
        redirect('usuarios');
    }
}
