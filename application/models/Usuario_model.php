<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los usuarios
    public function obtener_todos() {
        $this->db->order_by('us_id', 'ASC'); 
        return $this->db->get('us_usuarios')->result();
    }

    // Obtener usuarios por un conjunto de IDs
    public function obtener_por_ids($ids) {
        if (empty($ids)) {
            return [];
        }
        $this->db->where_in('us_id', $ids);
        $this->db->order_by('us_id', 'ASC');
        return $this->db->get('us_usuarios')->result();
    }

    // Verificar si ya existe un correo
    public function existe_correo($correo) {
        $this->db->where('us_correo', $correo);
        $query = $this->db->get('us_usuarios');
        return $query->num_rows() > 0;
    }

    // Insertar nuevo usuario con validación y cifrado
    public function insertar($data, $algoritmo = 'bcrypt') {
        if ($this->existe_correo($data['us_correo'])) {
            return false; 
        }

        // Cifrado de contraseña según algoritmo
        switch ($algoritmo) {
            case 'md5':
                $data['us_password'] = md5($data['us_password']);
                break;
            case 'sha1':
                $data['us_password'] = sha1($data['us_password']);
                break;
            case 'sha256':
                $data['us_password'] = hash('sha256', $data['us_password']);
                break;
            case 'bcrypt':
            default:
                $data['us_password'] = password_hash($data['us_password'], PASSWORD_BCRYPT);
                break;
        }

        return $this->db->insert('us_usuarios', $data);
    }

    // Borrar usuario por ID
    public function borrar($id) {
        return $this->db->delete('us_usuarios', array('us_id' => $id));
    }

    // Obtener un usuario por ID
    public function get_usuario($id) {
        return $this->db->where('us_id', $id)->get('us_usuarios')->row();
    }

    // Actualizar usuario por ID (con opción de cambiar contraseña)
    public function actualizar($id, $data, $algoritmo = null) {
        if (!empty($data['us_password']) && $algoritmo) {
            switch ($algoritmo) {
                case 'md5':
                    $data['us_password'] = md5($data['us_password']);
                    break;
                case 'sha1':
                    $data['us_password'] = sha1($data['us_password']);
                    break;
                case 'sha256':
                    $data['us_password'] = hash('sha256', $data['us_password']);
                    break;
                case 'bcrypt':
                default:
                    $data['us_password'] = password_hash($data['us_password'], PASSWORD_BCRYPT);
                    break;
            }
        }
        return $this->db->where('us_id', $id)->update('us_usuarios', $data);
    }
    // Validar credenciales de login de usuario normal
    public function login($correo, $password) {
        $usuario = $this->db->get_where('us_usuarios', array('us_correo' => $correo))->row();
    if ($usuario) {
        // Detectar tipo de hash
        if (substr($usuario->us_password, 0, 4) === '$2y$') {
            // bcrypt
            if (password_verify($password, $usuario->us_password)) {
                return $usuario;
            }
        } elseif (strlen($usuario->us_password) === 32) {
            // md5
            if (md5($password) === $usuario->us_password) {
                return $usuario;
            }
        } elseif (strlen($usuario->us_password) === 40) {
            // sha1
            if (sha1($password) === $usuario->us_password) {
                return $usuario;
            }
        } elseif (strlen($usuario->us_password) === 64) {
            // sha256
            if (hash('sha256', $password) === $usuario->us_password) {
                return $usuario;
            }
        }
    }
    return false;
}

}
