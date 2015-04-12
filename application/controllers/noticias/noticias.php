<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    /*
     * 
     */
    function index($pagina = 1)
    {
        // CONFIGURACION DE  PAGINACION
        $elementos = $this->Noticia->contar_noticias();
        
        $config['base_url'] = base_url('noticias/noticias/index');
        $config['total_rows'] = $elementos;
        $config['per_page'] = 1; // NUMERO DE ELEMENTOS POR PAGINA
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $elementos;
        $config['cur_tag_open'] = '<b>';
        $config['cur_tag_close'] = '</b>';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = "Anterior";
        
        $this->pagination->initialize($config);
        
        // if ($this->uri->segment(3))
        // {
            // $pagina = $this->uri->segment(3);
        // }
        // else
        // {
            // $pagina = 1;
        // }
        
        $data['noticias'] = $this->Noticia->obtener_noticias($config['per_page'], $pagina - 1);
        
        //$enlaces = $this->pagination->create_links();
        $data['enlaces'] = $this->pagination->create_links();//explode('&nbsp;', $enlaces);
        
        redir_sitio('noticias/inicio', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}