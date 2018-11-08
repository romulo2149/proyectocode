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
        session_start();
        if(isset($_SESSION['usuario']))
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
        else
        {
            if($this->input->post() != null)
            {
                $data = array(
                    'nombre_usuario' => $this->input->post()['nombre_usuario'],
                    'password_usuario' => $this->input->post()['password_usuario']
                );
                $this->load->model('usuario');
                $respuesta = $this->usuario->usuarioExiste($data);
                
                if($respuesta == true)
                {
                    $respuesta = $this->usuario->loginUsuario($data);
                    if($respuesta == true)
                    {
                        $data['mensajeExito'] = 'Logueo exitoso';
                        $_SESSION['usuario'] = $this->input->post()['nombre_usuario'];
                        $this->load->view('welcome_message', $data);
                    }
                    else
                    {
                        $data['mensajePass'] = 'Contraseña Incorrecta';
                        $this->load->view('login', $data);
                    }
                }
                
                else
                {
                    $data['mensajeUser'] = 'Usuario no existe';
                    $this->load->view('login', $data);
                }
            }
            else
            {
                $data['mensajeObligatorio'] = 'Campos Obligatorios';
                    $this->load->view('login', $data);
            }
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
