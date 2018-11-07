<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class login extends CI_Controller
{

    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $this->load->view('welcome_message');
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function entrar()
    {
        if($this->input->post() != null)
        {
            $data = array(
                'nombre_usuario' => $this->input->post()['nombre_usuario'],
                'password_usuario' => $this->input->post()['password_usuario']
            );
            $this->load->model('usuario');
            $respuesta = $this->usuario->loginUsuario($data);
            
            if($respuesta == true)
            {
                session_start();
                $_SESSION['usuario'] = $this->input->post()['nombre_usuario'];
                $info = array(
                    "mensaje" => "Sesión iniciada con éxito"
                );
                $this->load->view('welcome_message', $info);
            }
            else
            {
                $info = array(
                    "mensaje" => "La contraseña es incorrecta"
                );
                $this->load->view('welcome_message', $info);
            }
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }

    public function salir()
    {
        session_start();
        session_destroy();
        header('Location: http://localhost/Proyecto/index.php/welcome');
        exit();
    }
    
}


?>