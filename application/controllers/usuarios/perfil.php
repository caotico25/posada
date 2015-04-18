<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller
{
    function index()
    {
        $data = $this->datos_ficha();
        
        redir_sitio('usuarios/perfil', $data);
    }
    
    
    function datos_ficha()
    {
        $id_usuario = $this->session->userdata('id_login');
        
        $data['partidas_m'] = $this->Partida->partidas_master($id_usuario);
        $data['partidas_p'] = $this->Partida->partidas_player($id_usuario);
        
        return $data;
    }
    
    
    function cambio_passwd()
    {
        $this->load->view('usuarios/cambio_passwd');
    }
    
    
    
}