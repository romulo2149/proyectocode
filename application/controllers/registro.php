<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class registro extends CI_Controller
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
            $this->load->view('registro');
        }
    }


    public function registrar()
    {
        session_start();
        if(!isset($_SESSION['usuario']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre_usuario', 'Username', 'alpha_numeric|min_length[5]|max_length[16]|callback_usuarioEx', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El nombre no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Solo se permiten caracteres alfanuméricos en el nombre de usuario</div>',
                    'min_length'  => '<div class="alert alert-warning" role="alert">El nombre debe contener al menos 5 caracteres</div>',
                    'max_length'  => '<div class="alert alert-warning" role="alert">El nombre debe contener como máximo 16 caracteres</div>'
                ));
            $this->form_validation->set_rules('password_usuario', 'Password', 'required|min_length[8]|max_length[16]|alpha_numeric', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El password no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Solo se permiten caracteres alfanuméricos en el password</div>',
                    'min_length'  => '<div class="alert alert-warning" role="alert">El password debe contener al menos 8 caracteres</div>',
                    'max_length'  => '<div class="alert alert-warning" role="alert">El password debe contener como máximo 16 caracteres</div>'
                ));
            $this->form_validation->set_rules('confirma_password', 'Password Confirmation', 'required|matches[password_usuario]',
                array(
                    'required' => '<div class="alert alert-warning" role="alert">Recuerda escribir nuevamente el password</div>',
                    'matches' => '<div class="alert alert-warning" role="alert">Los passwords no coinciden</div>'
                ));
            
            if ($this->form_validation->run() == TRUE)
            {
                $hashPass = password_hash($this->input->post()['password_usuario'], PASSWORD_DEFAULT);
                $data = array(
                    'nombre_usuario' => $this->input->post()['nombre_usuario'],
                    'password_usuario' => $hashPass,
                    'fecha_creacion' => date('Y-m-d H:i:s')
                );
                $this->load->model('usuario');
                $this->usuario->registrarUsuario($data);
                $_SESSION["usuario"] = $this->input->post()['nombre_usuario'];
                $this->load->view('welcome_message');
            }
            else
            {
                $this->load->view('registro');
            }
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }

    public function usuarioEx($str)
    {
        $this->load->model('usuario');
        $res = $this->usuario->usuarioExiste($str);
        if($res == true)
        {
            $this->load->library('form_validation');
            $this->form_validation->set_message('usuarioEx', '<div class="alert alert-warning" role="alert">Nombre de usuario existente, intenta con otro</div>');
            return FALSE;
        }
        else
        {
            return true;
        }
    }
}


?>
