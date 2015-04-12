<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    /*
     * 
     */
    function index()
    {
        $data['noticias'] = $this->Noticia->obtener_noticias(10);
        
        redir_admin('noticias/inicio', $data);
    }
    
    
    /*
     * 
     */
    function escribir_noticia()
    {
        $reglas = array(
                        array(
                            'field' => 'titulo',
                            'label' => 'Titulo',
                            'rules' => 'trim|required|max_length[50]'
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
            redir_admin('admin/noticias/alta_noticia');
        }
        else
        {
            $this->Noticia->escribir_noticia($this->input->post());
            $this->session->set_flashdata('mensaje', 'Noticia creada correctamente.');
            
            redirect('admin/noticias');
        }
    }
    
    
    /*
     * 
     */
    function eliminar_noticia()
    {
        $this->Noticia->eliminar($this->input->post('id_noticia'));
        
        redirect('admin/noticias');
    }
    
    
    /*
     * 
     */
    function modificar_noticia()
    {
        $reglas = array(
                        array(
                            'field' => 'titulo',
                            'label' => 'Titulo',
                            'rules' => 'trim|required|max_length[50]'
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
            $data['noticia'] = $this->Noticia->obtener_noticia($this->input->post('id_noticia'));
            
            redir_admin('admin/noticias/mod_noticia', $data);
        }
        else
        {
            $this->Noticia->modificar_noticia($this->input->post());
            $this->session->set_flashdata('mensaje', 'Noticia modificada correctamente.');
            
            redirect('admin/noticias');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}