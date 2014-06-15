<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    /*
     * 
     */
    function index()
    {
        $data['noticias'] = $this->Noticia->obtener_noticias();
        
        redir_sitio('noticias/inicio', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}