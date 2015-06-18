<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller
{
    /*
     * 
     */
    function eliminar_tipo_juego()
    {
        $this->Juego->eliminar($this->input->post('id_tipo_juego'));
        
        redirect('admin/inicio');
    }
    
    
    /*
     * 
     */
    function modificar_tipo_juego()
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
            $data['juego'] = $this->Juego->obtener_tipo_juego($this->input->post('id_tipo_juego'));
            
            redir_admin('admin/juegos/mod_juego', $data);
        }
        else
        {
            $this->Noticia->modificar_noticia($this->input->post());
            $this->session->set_flashdata('mensaje', 'Juego modificado correctamente.');
            
            redirect('admin/inicio');
        }
    }

/* FUNCIONES PARA LA CREACION DENUEVS TIPOS DE JUEGO */
    
    
    /**
     * 
     */
    function nuevo_juego()
    {
        redir_admin('admin/juegos/crear_juego');
    }
    
    
    /**
     * CREA UN NUEVO TIPO DE JUEGO
     */
    function crear_tipo_juego()
    {
        $id_juego_nuevo = $this->Juego->nuevo_juego($this->input->post());
        
        echo json_encode($id_juego_nuevo);
    }
    
    
    /**
     * CREA UNA NUEVA CATEGORIA
     */
    function crear_categoria()
    {
        $this->Juego->crear_categoria($this->input->post());
        
        echo "ok";
    }
    
    
    /**
     * CREA UN NUEVO CAMPO
     */
    function crear_campo()
    {
        $this->Juego->crear_campo($this->input->post());
        
        echo json_encode("ok");
    }
    
    
    /**
     * CREA UN NUEVO CAMPO
     */
    function crear_campo_sub()
    {
        $this->Juego->crear_campo_sub($this->input->post());
        
        echo json_encode("ok");
    }
    
    
    /**
     * LISTA LAS FICHAS PARA SU EDICION
     */
    function editar()
    {
        $juegos = $this->Juego->obtener_juegos();
        
        $this->load->view('admin/juegos/lista_juegos',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}