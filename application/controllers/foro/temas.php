<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temas extends CI_Controller
{
    function index()
    {
        $data['contenido'] = 'esto es contenido';
        $this->load->view('comunes/plantilla', $data);
    }
}