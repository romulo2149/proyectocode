<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class cambiar extends CI_Controller
{

    public function index()
    {
        $this->load->library('form_validation');
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
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password_usuario', 'Password', 'required|alpha_numeric|callback_loginPass', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El password no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Los passwords solo contienen caracteres alfanumericos</div>'
                ));
            $this->form_validation->set_rules('nuevo_password', 'Password', 'required|min_length[8]|max_length[16]|alpha_numeric', 
                array(
                    'required' => '<div class="alert alert-warning" role="alert">El password no puede estar vacio</div>',
                    'alpha_numeric' => '<div class="alert alert-warning" role="alert">Solo se permiten caracteres alfanuméricos en el password</div>',
                    'min_length'  => '<div class="alert alert-warning" role="alert">El password debe contener al menos 8 caracteres</div>',
                    'max_length'  => '<div class="alert alert-warning" role="alert">El password debe contener como máximo 16 caracteres</div>'
                ));
            if ($this->form_validation->run() == TRUE)
            {
                $hashPass = password_hash($this->input->post()['nuevo_password'], PASSWORD_DEFAULT);
                $data = array(
                    'nombre_usuario' => $_SESSION['usuario'],
                    'password_usuario' => $hashPass
                );
                $this->load->model('usuario');
                $this->usuario->cambiarPassword($data);
                $this->load->view('welcome_message');
            }
            else
            {
                $this->load->view('cambiarpassword');
            }
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }

    public function loginPass($str)
    {
        $this->load->model('usuario');
        $res = $this->usuario->loginUsuario($_SESSION['usuario'], $str);
        if($res == true)
        {
            return true;
        }
        else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_message('loginPass', '<div class="alert alert-warning" role="alert">Contraseña Incorrecta</div>');
            return false;
        }
    }
}