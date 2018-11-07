<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class chofer extends CI_Controller
{

    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $this->load->view('chofer');
        }
        else
        {
            $this->load->view('login');
        }
    }
}

?>