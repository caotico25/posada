<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foro extends CI_Controller
{
    function index()
    {
        redir_admin();
    }
    
    function crear_seccion()
    {
        $reglas = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|required|max_length[20]'
                        ),
                        array(
                            'field' => 'descripcion',
                            'label' => 'Descripción',
                            'rules' => "trim|required|max_length[100]"
                        )
        );
                    
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('admin/foro/alta_seccion');
        }
        else
        {
            $this->Foro->alta_seccion($this->input->post());
            $this->session->set_flashdata('mensaje', 'Ayuda creada correctamente.');
            
            redirect('admin/gestiones/gestion_ayudas');
        }
    }
}