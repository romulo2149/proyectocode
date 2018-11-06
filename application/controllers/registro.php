<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class registro extends CI_Controller
{
    public function index()
    {
        if($this->input->post()['password_usuario'] == $this->input->post()['confirma_passsword'])
        {
            $data = array(
                'nombre_usuario' => $this->input->post()['nombre_usuario'],
                'password_usuario' => $this->input->post()['password_usuario'],
                'fecha_creacion' => date()
            );
            $this->load->model('usuario');
            $respuesta = $this->usuario->registrarUsuario($data);

            if($respuesta == true)
            {
                session_start();
                $_SESSION['usuario'] = $this->input->post()['nombre_usuario'];
                echo 'sesión iniciada con exito';
                echo '<br>';
                echo $_SESSION['usuario'];
            }
            else
            {
                echo 'nombre de usuario duplicado';
            }
        }
        else
        {
            echo 'Los passwords no coinciden';
        }
    }
}


?>