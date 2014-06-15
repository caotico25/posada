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


    function partida_master()
    {
        $id_partida = $this->input->post('id_partida');
        
        //$this->Partida->activar_partida($id_partida);
        
        $res = $this->Partida->obtener_tipo_juego($id_partida);
        $tipo_juego = $res['tipo_juego'];
        
        $res = $this->Ficha->id_ficha_base($tipo_juego);
        $id_ficha = $res['ficha'];
        
        $data['id_partida'] = $id_partida;
        $data['ficha'] = $this->Ficha->obtener_datos_ficha($id_ficha);
        $data['inventario'] = $this->Ficha->obtener_inventario($id_ficha);
        $data['personaje'] = $this->Ficha->obtener_datos_personaje($id_ficha);
        $data['otra_info'] = $this->Ficha->obtener_otra_info($id_ficha);
        $data['atributos'] = $this->Ficha->obtener_atributos($id_ficha);
        $data['habilidades'] = $this->Ficha->obtener_habilidades($id_ficha);
        $data['ventajas'] = $this->Ficha->obtener_ventajas($id_ficha);
        $data['otros_parametros'] = $this->Ficha->obtener_otros_parametros($id_ficha);
        
        $ficha = $this->load->view('partidas/ficha', $data , TRUE);
        
        $data = NULL;
        
        $data['mensajes'] = array_reverse($this->Chat->obtener_mensajes($id_partida));
        
        $chat = $this->load->view('partidas/chat', $data, TRUE);
        
        $data = NULL;
        
        $data['ficha'] = $ficha;
        $data['chat'] = $chat;
        $data['id_ficha'] = $id_ficha;
        $data['id_partida'] = $id_partida;
        
        
        $this->load->view('partidas/partida', $data);
    }


    /*
     * 
     */
    function cerrar_partida()
    {
        $id_partida = $this->input->post('id_partida');
        
        $this->Partida->activar_partida($id_partida);
        
        return 'hola';
    }


    /*
     * 
     */
    function validar_nueva_partida()
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
            echo validation_errors();
        }
        else
        {
            $this->Partida->nueva_partida($this->input->post());
            
            redirect('usuarios/perfil');
        }
    }
























}