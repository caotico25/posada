<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidas extends CI_Controller
{
    function index()
    {
        redir_admin('partidas/inicio');
    }
    
    
    function nueva_partida()
    {
        $reglas = array(
                        array(
                            'field' => 'nombre',
                            'label' => 'Nombre',
                            'rules' => 'trim|required|max_length[20]'
                        ),
                        array(
                            'field' => 'descripcion',
                            'label' => 'Descripcion',
                            'rules' => 'trim|required|max_length[100]'
                        )
                    );
        
        $data['tipos_juego'] = $this->Partida->obtener_tipos_juego();
        $data['estados'] = $this->Partida->obtener_estados();
                    
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('partidas/nueva_partida', $data);
        }
        else
        {
            $this->Partida->nueva_partida($this->input->post());
            
            redirect('usuarios/perfil');
        }
    }


    function iniciar_partida()
    {
        $this->load->view('partidas/partida');
    }
}