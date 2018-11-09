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
            
            $this->load->view('comentarios', $data);
        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }

    public function publicar()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
                $string = trim($this->input->post()['chofer']);
                $string2 = trim($this->input->post()['comentario']);
                $data = array(
                    'usuario' => $_SESSION['usuario'],
                    'chofer' => $string,
                    'texto' => $this->input->post()['texto'],
                    'comentario' => $string2,
                    'fecha_envio' => date('Y-d-m h:i:s')
                );
                $this->load->model('comentario');
                $this->comentario->insertarComentario($data);
                $data['comentarios']=$this->comentario->getComentarios($string2, $string);
                $fecha2 = new DateTime($string2);
                $dia = $fecha2->format('d');
                $mes = $fecha2->format('m');
                $ano = $fecha2->format('Y');
                header("Location: http://localhost/Proyecto/index.php/detalle/dia/".$ano."/".$dia."/".$mes."/".$string);
            

        }
        else
        {
            header('Location: http://localhost/Proyecto/index.php/welcome');
        }
    }
}

?>












