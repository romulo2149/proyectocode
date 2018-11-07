<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class detalle extends CI_Controller
{
    public function dia()
    {
        $año = $this->uri->segment(3);
        $mes = $this->uri->segment(4);
        $dia = $this->uri->segment(5);
        $chofer = $this->uri->segment(6);
        $fecha = new DateTime($año."-".$mes."-".$dia);
        $this->load->model('recorridos');
        $data['lista'] = $this->recorridos->getrecorridodia($fecha, str_replace("%20"," ",$chofer));
        session_start();
        $this->load->view('detalle', $data);
    }
}

?>