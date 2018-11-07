<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class calendario extends CI_Controller
{
    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $conf = array(
                'day_type' => 'short',
                'month_type' => 'long',
                'show_next_prev'  => TRUE,
                'next_prev_url'   => 'http://localhost/Proyecto/index.php/calendario/show/'
            );
            $this->load->library('calendar', $conf);
            $año = date('Y');
            $mes = date('m');
            $datos = array(
                1 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/01',
                2 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/02',
                3 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/03',
                4 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/04',
                5 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/05',
                6 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/06',
                7 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/07',
                8 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/08',
                9 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/09',
                10 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/10',
                11 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/11',
                12 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/12',
                13 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/13',
                14 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/14',
                15 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/15',
                16 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/16',
                17 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/17',
                18 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/18',
                19 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/19',
                20 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/20',
                21 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/21',
                22 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/22',
                23 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/23',
                24 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/24',
                25 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/25',
                26 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/26',
                27 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/27',
                28 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/28',
                29 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/29',
                30 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/30',
                31 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/31'
              
            );
            $data = array('cal' => $this->calendar->generate($año, $mes, $datos));
            $this->load->view('calendario', $data);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function show()
    {
        $conf = array(
            'day_type' => 'short',
            'month_type' => 'long',
            'show_next_prev'  => TRUE,
            'next_prev_url'   => 'http://localhost/Proyecto/index.php/calendario/show/'
        );
        $this->load->library('calendar', $conf);
        $año = $this->uri->segment(3);
        $mes = $this->uri->segment(4);
        $datos = array(
            1 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/01',
            2 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/02',
            3 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/03',
            4 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/04',
            5 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/05',
            6 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/06',
            7 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/07',
            8 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/08',
            9 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/09',
            10 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/10',
            11 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/11',
            12 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/12',
            13 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/13',
            14 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/14',
            15 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/15',
            16 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/16',
            17 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/17',
            18 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/18',
            19 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/19',
            20 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/20',
            21 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/21',
            22 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/22',
            23 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/23',
            24 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/24',
            25 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/25',
            26 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/26',
            27 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/27',
            28 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/28',
            29 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/29',
            30 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/30',
            31 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/31'
          
        );
        $data = array('cal' => $this->calendar->generate($año, $mes, $datos));
        session_start();
        $this->load->view('calendario', $data);
    }
}


?>