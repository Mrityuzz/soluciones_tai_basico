<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    
    public function index() {
        if (!$this->session->userdata('admin_logged')) {
            redirect('login');
        }

        $id_admin = $this->session->userdata('admin_id');
        $data['admin'] = $this->Admin_model->get_admin($id_admin);

        $this->load->view('layout/header'); 
        $this->load->view('perfil', $data);
        //$this->load->view('layout/footer'); 
    }

    public function cambiar_password() {
        if (!$this->session->userdata('admin_logged')) {
            redirect('login');
        }

        $id_admin = $this->session->userdata('admin_id');
        $actual   = $this->input->post('password_actual');
        $nueva    = $this->input->post('password_nueva');
        $confirm  = $this->input->post('password_confirmar');

        $admin = $this->Admin_model->get_admin($id_admin);

        if (!password_verify($actual, $admin->password)) {
            $this->session->set_flashdata('msg', 'La contraseña actual no es correcta');
            redirect('perfil');
        }

        if ($nueva !== $confirm) {
            $this->session->set_flashdata('msg', 'La nueva contraseña no coincide con la confirmación');
            redirect('perfil');
        }

        $hash = password_hash($nueva, PASSWORD_DEFAULT);
        $this->Admin_model->cambiar_password($id_admin, $hash);

        $this->session->set_flashdata('msg', 'Contraseña actualizada correctamente');
        redirect('perfil');
    }
}
