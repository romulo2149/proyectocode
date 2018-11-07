<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class detalle extends CI_Controller
{
    public function dia()
    {
        $año = $this->uri->segment(3);
        $mes = $this->uri->segment(4);
        $dia = $this->uri->segment(5);
        $date_object = new DateTime($año."-".$mes."-".$dia);
        $fecha2 = date('Y-m-d',
        mktime(0, 0, 0,
            $date_object->format("m"),
            $date_object->format("d")+1,
            $date_object->format("Y")
            )
        ); 
    }
}

?>