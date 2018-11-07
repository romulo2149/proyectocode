<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class cambiar extends CI_Controller
{

    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $this->load->view('cambiarpassword');
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function cambiarpassword()
    {
        $data = array(
            'nombre_usuario' => $this->input->post()['nombre_usuario'],
            'password_usuario' => $this->input->post()['password_usuario'],
            'nuevo_password' => $this->input->post()['nuevo_password']
        );
        $this->load->model('usuario');
        $respuesta = $this->usuario->loginUsuario($data);
        
        if($respuesta == true)
        {
            $this->usuario->cambiarPassword($data);
            echo 'cambio de contraseña exitoso';
        }
        else
        {
            echo 'mala contraseña';
        }
    }
}