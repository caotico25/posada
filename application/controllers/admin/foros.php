<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foros extends CI_Controller
{
    
    function index()
    {
        redir_admin();
    }
    
    
    
    /*
     * FUNCIONES PARA SECCIONES
     */
    
    
    
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
            $this->session->set_flashdata('mensaje', 'Sección creada correctamente.');
            
            redirect('admin/inicio');
        }
    }
    
    
    
    function modificar_seccion()
    {
        $secciones = $this->Foro->obtener_secciones();
        $data['secciones'] = $secciones;
        
        $reglas = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|max_length[20]'
                        ),
                        array(
                            'field' => 'descripcion',
                            'label' => 'Descripción',
                            'rules' => "trim|max_length[100]"
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('admin/foro/modificar_secciones', $data);
        }
        else
        {
            $this->Foro->mod_seccion($this->input->post());
            $this->session->set_flashdata('mensaje', 'Sección modificado correctamente.');
            
            redirect('admin/foros/modificar_seccion');
        }
    }



    function eliminar_seccion()
    {
        $secciones = $this->Foro->obtener_secciones();
        $data['secciones'] = $secciones;
        
        if ($this->input->post())
        {
            $this->Foro->eliminar_seccion($this->input->post('id_seccion'));
            
            redirect('admin/foros/eliminar_seccion');
        }
        
        redir_admin('admin/foro/eliminar_secciones', $data);
    }



    /*
     *      FUNCIONES PARA TEMAS
     */
     
     
     
    function crear_tema()
    {
        $reglas = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|required|max_length[20]'
                        ),
                        array(
                            'field' => 'contenido',
                            'label' => 'Contenido',
                            'rules' => "trim|required"
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('admin/foro/alta_tema');
        }
        else
        {
            $this->Foro->alta_seccion($this->input->post());
            $this->session->set_flashdata('mensaje', 'Tema creado correctamente.');
            
            redirect('admin/inicio');
        }
    }
    
    
    
    function modificar_tema()
    {
        $secciones = $this->Foro->obtener_secciones();
        $data['secciones'] = $secciones;
        
        $reglas = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|max_length[20]'
                        ),
                        array(
                            'field' => 'contenido',
                            'label' => 'Contenido',
                            'rules' => "trim"
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('admin/foro/modificar_temas', $data);
        }
        else
        {
            $this->Foro->mod_seccion($this->input->post());
            $this->session->set_flashdata('mensaje', 'Tema modificado correctamente.');
            
            redirect('admin/foros/modificar_tema');
        }
    }



    function eliminar_tema()
    {
        $this->foro->eliminar_tema();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}