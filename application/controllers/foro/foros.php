<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foros extends CI_Controller
{
    
    function index()
    {
        $data['secciones'] = $this->Foro->obtener_secciones();
        $data['temas'] = $this->Foro->obtener_temas();
        redir_sitio('foro/inicio', $data);
    }

}