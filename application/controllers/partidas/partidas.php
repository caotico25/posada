<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidas extends CI_Controller
{
    function index($pagina = 1)
    {
        // CONFIGURACION DE  PAGINACION
        $elementos = $this->Partida->contar_partidas();
        
        $config['base_url'] = base_url('partidas/partidas/index');
        $config['total_rows'] = $elementos;
        $config['per_page'] = 4; // NUMERO DE ELEMENTOS POR PAGINA
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $elementos;
        $config['cur_tag_open'] = '<b>';
        $config['cur_tag_close'] = '</b>';
        $config['next_link'] = '&gt;';
        $config['prev_link'] = "&lt;";
        $config['uri_segment'] = 4;
        
        $this->pagination->initialize($config);
        
        $data['partidas'] = $this->Partida->obtener_partidas($config['per_page'], $pagina - 1);
        
        redir_sitio('partidas/inicio', $data);
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


    /*
     * 
     */
    function partida_master()
    {
        $id_partida = $this->input->post('id_partida');
        
        $this->Partida->activar_partida($id_partida);
        
        $res = $this->Partida->obtener_tipo_juego($id_partida);
        $tipo_juego = $res['tipo_juego'];
        
        $res = $this->Ficha->id_ficha_base($tipo_juego);
        $id_ficha = $res['ficha'];
        
        // OBTENEMOS LOS CAMPOS POR DEFECTO DE LA FICHA BASEc
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
    function partida_jugador()
    {
        $id_partida = $this->input->post('id_partida');
        
        $id_ficha = $this->Ficha->obtener_id_ficha(obtener_id(), $id_partida);
        
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
     * BLOQUEA LA PARTIDA PARA QUE LOS USUARIOS NO SE PUEDAN CONECTAR
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
    function unirse_a_partida()
    {
        extract($this->input->post());
        $jugador = $this->session->userdata('id_login');
        
        echo "<script type=''>alert($jugador);</script>";
        echo "<script type=''>alert($id_partida);</script>";
        echo "<script type=''>alert($tipo_juego);</script>";
        
        $this->Partida->anadir_jugador($id_partida, $jugador, $tipo_juego);
        
        redirect('usuarios/perfil');    // SE REDIRIGE SIEMPRE A LA FICHA DEL USUARIO PARA EVITAR ERRORES
                                        // QUE ACCEDA A LA PARTIDA QUE DESEE DESDE ALLÍ
    }


    /*
     * 
     */
    function informe_partidas()
    {
        $num_partidas = $this->Partida->contar_partidas();
        $data['partidas'] = $this->Partida->obtener_partidas($num_partidas);
        
        $html = $this->load->view('admin/informes/informe_partidas', $data, TRUE);
        
        $mpdf =new mPDF('c', 'A4');
        
        $mpdf->SetHeader('LA POSADA DEL CAOS');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html);
        
        $mpdf->Output();
    }


    /*
     * 
     *  Funcion usada para crear la ficha de personaje para el jugador
     *  Creando en cada tabla una nueva fila con la nueva ficha
     * 
     */
    function crear_ficha()
    {
        // crear campos
    }


    /*
     * 
     */
    function cambiar_estado()
    {
        $this->Partida->cambiar_estado($this->input->post());
    }


    /*
     *  FINALIZA LA PARTIDA INDICADA
     */
    function finalizar_partida($id_partida)
    {
        $this->Partida->finalizar_partida($id_partida);
    }







}