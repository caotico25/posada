<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chats extends CI_Controller
{
    /*
     * 
     */
    function insertar_mensaje()
    {
        $partida = $this->input->post('partida');
        
        $this->Chat->insertar_mensaje($this->input->post());
        
        $data['mensajes'] = array_reverse($this->Chat->obtener_mensajes($partida));
        
        $this->load->view('partidas/chat', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
}    