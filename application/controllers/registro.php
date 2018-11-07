<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class registro extends CI_Controller
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
            $this->load->view('registro');
        }
    }


    public function registrar()
    {
        if($this->input->post() != null)
        {
            if($this->input->post()['password_usuario'] == $this->input->post()['confirma_password'])
            {
                $data = array(
                    'nombre_usuario' => $this->input->post()['nombre_usuario'],
                    'password_usuario' => $this->input->post()['password_usuario'],
                    'fecha_creacion' => date('Y-m-d H:i:s')
                );
                $this->load->model('usuario');
                $respuesta = $this->usuario->registrarUsuario($data);
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
                        "mensaje" => "Nombre de usuario duplicado"
                    );
                    $this->load->view('welcome_message', $info);
                }
                
            }
            else
            {
                $info = array(
                    "mensaje" => "Las contraseñas no coinciden"
                );
                $this->load->view('welcome_message', $info);
            }
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }
}


?>