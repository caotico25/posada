<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller
{
    
    /*
     * 
     */
    function index($id_post)
    {
        $comentarios = $this->Foro->comentarios_de($id_post);
        $data['comentarios'] = $comentarios;
        $data['id_post'] = $id_post;
        
        $post = $this->Foro->datos_post($id_post);
        $data['post'] = $post;
        
        redir_sitio('foro/post', $data);
    }
    
    /*
     * 
     */
    function nuevo_post()
    {
        $id_tema = $this->input->post('id_tema');
        $data['id_tema'] = $id_tema;
        
        $reglas = array(
                        array(
                            'field' => 'titulo',
                            'label' => 'Titulo',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'contenido',
                            'label' => 'Contenido',
                            'rules' => 'trim|required'
                        )
                    );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('foro/nuevo_post', $data);
        }
        else
        {
            $usuario = $this->session->userdata('id_login');
            $this->Foro->nuevo_post($this->input->post(), $usuario);
            
            $id_post = $this->Foro->id_post($this->input->post('titulo'));
            
            redirect('foro/posts/index/' . $id_post['id']);
        }
    }
    
    
    
    
    
    
} 