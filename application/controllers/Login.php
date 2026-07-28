<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function auth() {
        $correo = $this->input->post('correo');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->validar_admin($correo, $password);

        if ($admin) {
            $this->session->set_userdata([
                'admin_logged' => true,
                'admin_id'     => $admin->id_admin,
                'admin_correo' => $admin->correo,
                'admin_rol'    => $admin->rol
            ]);
            redirect('usuarios'); 
        } else {
            $data['error'] = 'Credenciales inválidas';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
