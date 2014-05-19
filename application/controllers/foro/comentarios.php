<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentarios extends CI_Controller
{
    
    /*
     * 
     */
    function nuevo_comentario()
    {
        $id_post = $this->input->post('id_post');
        $data['id_post'] = $id_post;
        
        $reglas = array(
                        array(
                            'field' => 'contenido',
                            'label' => 'Contenido',
                            'rules' => 'trim|required'
                        )
                    );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('foro/nuevo_comentario', $data);
        }
        else
        {
            $usuario = $this->session->userdata('id_login');
            $this->Foro->nuevo_comentario($this->input->post(), $usuario);
            
            redirect('foro/posts/index/' . $id_post);
        }
    }
    
    
    
    
    
    
} 