<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Usuario_model'); 
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function auth() {
        $login_input = $this->input->post('login');
        $password    = $this->input->post('password');

        $admin = $this->Admin_model->validar_admin($login_input, $password);

        if ($admin) {
            $this->session->set_userdata([
                'admin_logged' => true,
                'admin_id'     => $admin->id_admin,
                'admin_correo' => $admin->correo,
                'admin_user'   => $admin->username,
                'admin_rol'    => $admin->rol
            ]);
            redirect('usuarios'); 
            return;
        }

        // Si no es admin, intentamos validar como usuario normal
        $usuario = $this->Usuario_model->login($login_input, $password);

        if ($usuario) {
            $this->session->set_userdata([
                'us_id'  => $usuario->us_id,
                'rol'    => $usuario->rol,
                'correo' => $usuario->us_correo
            ]);
            redirect('usuario/perfil'); 
            return;
        }

        // Si falla en ambos casos
        $data['error'] = 'Credenciales inválidas';
        $this->load->view('login_view', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
