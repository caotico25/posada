<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller
{
    function index()
    {
        $data = $this->datos_ficha();
        
        redir_sitio('usuarios/perfil', $data);
    }
    
    
    function datos_ficha()
    {
        $id_usuario = $this->session->userdata('id_login');
        
        $data['partidas_m'] = $this->Partida->partidas_master($id_usuario);
        $data['partidas_p'] = $this->Partida->partidas_player($id_usuario);
        
        return $data;
    }
    
    
    function cambio_passwd()
    {
        $reglas = array(
                        array(
                            'field' => 'passwd',
                            'label' => 'Contraseña',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 're_passwd',
                            'label' => 'Confirmar contraseña',
                            'rules' => 'trim|required|matches[passwd]'
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['mensaje'] = '';
            $this->load->view('usuarios/cambio_passwd', $data);
        }
        else
        {
            $this->Usuario->cambio_passwd($this->input->post('passwd'));
            
            $data['mensaje'] = '';
            $this->load->view('usuarios/cambio_passwd', $data);
        }
    }
    
    
    
}