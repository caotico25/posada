<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller
{
    /*
     * 
     * Método principal de la clase Inicio.
     * Carga la vista principal del sitio web.
     *   
     */
    function index()
    {
        $data['noticias'] = $this->Noticia->obtener_noticias_inicio();
        $data['partidas'] = $this->Partida->obtener_partidas_inicio();
        
        redir_sitio('portal/inicio', $data);
    }
    
    function login()
    {
        $usuario = $this->input->post('usuario_log');
        
        $reglas = array(
                        array(
                            'field' => 'usuario_log',
                            'label' => 'Usuario',
                            'rules' => 'trim|required|callback__usuario_existe'
                        ),
                        array(
                            'field' => 'passwd',
                            'label' => 'Contraseña',
                            'rules' => 'trim|required|callback__password_valido['.$usuario.']'
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {
            redir_sitio('portal/registro');
        }
        else
        {
            $id_login = $this->Usuario->obtener_id($usuario);
            $this->session->set_userdata('user_login', $usuario);
            $this->session->set_userdata('id_login', $id_login);
            
            $data['usuario'] = $usuario;
            $data['id_login'] = $id_login;
            
            redirect('portal/inicio', $data);
        }
    }


    /*
     * 
     */
    function alta()
    {
        $reglas = array(
                        array(
                            'field' => 'usuario',
                            'label' => 'Usuario',
                            'rules' => 'trim|required|unique[usuarios.usuario]'
                        ),
                        array(
                            'field' => 'email',
                            'label' => 'Correo electrónico',
                            'rules' => 'trim|required|valid_email'
                        ),
                        array(
                            'field' => 'password',
                            'label' => 'Contraseña',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'password_confirm',
                            'label' => 'Confirmar contraseña',
                            'rules' => 'trim|required|matches[password]'
                        )
        );
        
        $this->form_validation->set_rules($reglas);
        
        if ($this->form_validation->run() == FALSE)
        {            
            redir_sitio('portal/registro');
        }
        else
        {
            $this->Usuario->alta($this->input->post());
            
            redirect('portal/inicio');
        }
    }


    function _password_valido($pass, $usuario)
    {
        if ($this->Usuario->password_valido($pass, $usuario))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_password_valido', 'Contraseña incorrecta');
            return FALSE;
        }
    }

    function _usuario_existe($usuario)
    {
        if ($this->Usuario->comprobar_usuario($usuario))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_usuario_existe', 'Usuario no válido.');
            return FALSE;
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('portal/inicio');
    }


    













}