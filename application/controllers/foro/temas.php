<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temas extends CI_Controller
{
    
    /*
     * 
     */
    function index($id_tema)
    {
        $posts = $this->Foro->posts_de($id_tema);
        $data['posts'] = $posts;
        $data['id_tema'] = $id_tema;
        
        $tema = $this->Foro->nombre_tema($id_tema);
        $data['tema'] = $tema['titulo'];
        
        redir_sitio('foro/tema', $data);
    }
    
    
    
    
    
    
    
    
    
}