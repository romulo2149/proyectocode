<?php

class usuario extends CI_Model
{
    public function registrarUsuario($data)
    {
        $this->load->database();
        $condition = "nombre_usuario =" . "'" . $data['nombre_usuario'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        
        $query = $this->db->get();
        if ($query->num_rows() == 0) 
        {
            $this->db->insert('usuarios', $data);
            if ($this->db->affected_rows() > 0) 
            {
                return true;
            }
        } 
        else 
        {
            return false;
        }
    }

    public function loginUsuario($data)
    {
        $this->load->database();
        $condition = "nombre_usuario =" . "'" . $data['nombre_usuario'] . "' AND password_usuario = '".$data['password_usuario']."'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
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
        $condition = "nombre_usuario =" . "'" . $data['nombre_usuario']."'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
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
        $this->db->set('password_usuario', $data['nuevo_password']);
        $this->db->where('nombre_usuario', $data['nombre_usuario']);
        $this->db->update('usuarios');
    }
}

?>