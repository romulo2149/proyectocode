<?php

class usuario extends CI_Model
{
    public function registrarUsuario($data)
    {
        $this->load->database();
        $this->db->insert('usuarios', $data);
    }

    public function loginUsuario($user, $pass)
    {
        $this->load->database();
        $query = $this->db
            ->select("*")
            ->from("usuarios")
            ->where("nombre_usuario", $user)
            ->get();
        $row = $query->row();
        if (password_verify($pass, $row->password_usuario))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function usuarioExiste($data)
    {
        $this->load->database();
        $query = $this->db->get_where('usuarios', array('nombre_usuario' => $data), 1);
        if ($query->num_rows() > 0) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function cambiarPassword($data)
    {
        $this->db->set('password_usuario', $data['password_usuario']);
        $this->db->where('nombre_usuario', $data['nombre_usuario']);
        $this->db->update('usuarios');
    }
}

?>

