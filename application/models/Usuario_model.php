<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los usuarios
    public function obtener_todos() {
        return $this->db->get('us_usuarios')->result();
    }

    // Verificar si ya existe un correo
    public function existe_correo($correo) {
        $this->db->where('us_correo', $correo);
        $query = $this->db->get('us_usuarios');
        return $query->num_rows() > 0;
    }

    // Insertar nuevo usuario con validación
    public function insertar($data) {
        if ($this->existe_correo($data['us_correo'])) {
            return false; 
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

    // Actualizar usuario por ID
    public function actualizar($id, $data) {
        return $this->db->where('us_id', $id)->update('us_usuarios', $data);
    }
}
