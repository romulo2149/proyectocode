<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class mapa extends CI_Controller
{
    public function punto()
    {
        $this->load->library('googlemaps');
        $punto = $this->uri->segment(3);
        $config['center'] = $punto;
        $config['zoom'] = '17';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = $punto;
        $this->googlemaps->add_marker($marker);
        $this->load->library('googlemaps');
        $data['map'] = $this->googlemaps->create_map();
        session_start();
        $this->load->view('mapa', $data);
    }

    public function recorrido()
    {
        $total = count($this->uri->segment_array());
        $puntos = $total-2;
        $ruta = array();

        for ($i = 3; $i<=$total; $i++)
        {
            array_push($ruta,$this->uri->segment($i));
        }
        $this->load->library('googlemaps');
        $config['center'] = $this->uri->segment(3);
        $config['zoom'] = '14';
        $config['directionsStart'] = $this->uri->segment(3);
        $config['directionsWaypointArray'] = $ruta;
        $config['directionsEnd'] =$this->uri->segment($total);
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();
        session_start();
        $this->load->view('mapa', $data);
    }
}


?>