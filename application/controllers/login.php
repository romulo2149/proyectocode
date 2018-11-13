<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class login extends CI_Controller
{

    public function index()
    {
        $this->load->library('form_validation');
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
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre_usuario', 'Username', 'required|alpha_numeric|callback_usuarioEx', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El nombre no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Solo se permiten caracteres alfanuméricos en el nombre de usuario</div>'
                ));
            $this->form_validation->set_rules('password_usuario', 'Password', 'required|alpha_numeric', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El password no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Los passwords solo contienen caracteres alfanumericos</div>'
                ));
            if ($this->form_validation->run() == TRUE)
            {
                $this->load->model('usuario');
                $response = $this->usuario->loginUsuario($this->input->post()['nombre_usuario'],$this->input->post()['password_usuario']);
                if($response == true)
                {
                    $_SESSION["usuario"] = $this->input->post()['nombre_usuario'];
                    $this->load->view('welcome_message');
                }
                else
                {
                    $data['error'] = "Error desconocido, contacta al administrador";
                    $this->load->view('welcome_message');
                }
            }
            else
            {
                $this->load->view('login');
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

    public function usuarioEx($str)
    {
        $this->load->model('usuario');
        $res = $this->usuario->usuarioExiste($str);
        if($res == true)
        {
            return true;
        }
        else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_message('usuarioEx', '<div class="alert alert-warning" role="alert">Nombre de usuario inexistente</div>');
            return false;
        }
    }
}


?>
