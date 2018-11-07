<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class calendario extends CI_Controller
{
    public function index()
    {
        if($this->input->get() != null)
        {
            session_start();
            $chofer = $this->input->get()['nombre_chofer'];
            if(isset($_SESSION['usuario']))
            {
                $conf = array(
                    'day_type' => 'short',
                    'month_type' => 'long',
                    'show_next_prev'  => TRUE,
                    'next_prev_url'   => 'http://localhost/Proyecto/index.php/calendario/show/'.$chofer.'/'
                );
                $this->load->library('calendar', $conf);
                $año = date('Y');
                $mes = date('m');
                $datos = array(
                    1 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/01/'.$chofer,
                    2 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/02/'.$chofer,
                    3 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/03/'.$chofer,
                    4 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/04/'.$chofer,
                    5 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/05/'.$chofer,
                    6 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/06/'.$chofer,
                    7 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/07/'.$chofer,
                    8 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/08/'.$chofer,
                    9 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/09/'.$chofer,
                    10 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/10/'.$chofer,
                    11 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/11/'.$chofer,
                    12 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/12/'.$chofer,
                    13 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/13/'.$chofer,
                    14 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/14/'.$chofer,
                    15 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/15/'.$chofer,
                    16 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/16/'.$chofer,
                    17 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/17/'.$chofer,
                    18 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/18/'.$chofer,
                    19 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/19/'.$chofer,
                    20 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/20/'.$chofer,
                    21 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/21/'.$chofer,
                    22 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/22/'.$chofer,
                    23 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/23/'.$chofer,
                    24 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/24/'.$chofer,
                    25 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/25/'.$chofer,
                    26 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/26/'.$chofer,
                    27 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/27/'.$chofer,
                    28 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/28/'.$chofer,
                    29 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/29/'.$chofer,
                    30 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/30/'.$chofer,
                    31 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/31'.$chofer
                
                );
                $data = array('cal' => $this->calendar->generate($año, $mes, $datos));
                $this->load->view('calendario', $data);
            }
            else
            {
                $this->load->view('login');
            }
        }
        else
        {
            session_start();
            $this->load->view('chofer');
        }
    }

    public function show()
    {
        $año = $this->uri->segment(4);
        $mes = $this->uri->segment(5);
        $chofer = $this->uri->segment(3);
        $conf = array(
            'day_type' => 'short',
            'month_type' => 'long',
            'show_next_prev'  => TRUE,
            'next_prev_url'   => 'http://localhost/Proyecto/index.php/calendario/show/'.$chofer.'/'
        );
        $this->load->library('calendar', $conf);
        $datos = array(
            1 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/01/'.$chofer,
                2 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/02/'.$chofer,
                3 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/03/'.$chofer,
                4 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/04/'.$chofer,
                5 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/05/'.$chofer,
                6 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/06/'.$chofer,
                7 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/07/'.$chofer,
                8 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/08/'.$chofer,
                9 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/09/'.$chofer,
                10 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/10/'.$chofer,
                11 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/11/'.$chofer,
                12 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/12/'.$chofer,
                13 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/13/'.$chofer,
                14 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/14/'.$chofer,
                15 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/15/'.$chofer,
                16 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/16/'.$chofer,
                17 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/17/'.$chofer,
                18 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/18/'.$chofer,
                19 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/19/'.$chofer,
                20 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/20/'.$chofer,
                21 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/21/'.$chofer,
                22 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/22/'.$chofer,
                23 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/23/'.$chofer,
                24 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/24/'.$chofer,
                25 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/25/'.$chofer,
                26 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/26/'.$chofer,
                27 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/27/'.$chofer,
                28 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/28/'.$chofer,
                29 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/29/'.$chofer,
                30 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/30/'.$chofer,
                31 => 'http://localhost/Proyecto/index.php/detalle/dia/'.$año.'/'.$mes.'/31'.$chofer
          
        );
        $data = array('cal' => $this->calendar->generate($año, $mes, $datos));
        session_start();
        $this->load->view('calendario', $data);
    }
}


?>