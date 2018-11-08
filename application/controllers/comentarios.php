<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class comentarios extends CI_Controller
{
    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $this->load->view('comentarios');
        }
        else
        {
            $this->load->view('login');
        }
    }
    public function nuevo()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $año = $this->uri->segment(3);
            $mes = $this->uri->segment(4);
            $dia = $this->uri->segment(5);
            $chofer = $this->uri->segment(6);
            $fecha = $año."-".$dia."-".$mes;
            $this->load->model('comentario');
            $data['comentarios']=$this->comentario->getComentarios($fecha, str_replace("%20"," ",$chofer));
            session_start();
            $this->load->view('comentarios', $data);
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }
}

?>












