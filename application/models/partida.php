<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partida extends CI_Model
{
    /*
     * 
     */
    function nueva_partida($datos)
    {
        extract($datos);
        
        $this->db->query("insert into partidas (nombre, descripcion, master, tipo_juego, estado)
                            values (upper(?), ?, $master, $tipo_juego, ?)", array($nombre, $descripcion, $estado));
    }
    
    
    /*
     * 
     */
    function partidas_master($id)
    {
        $res = $this->db->query("select * from partidas where master = $id");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function partidas_player($id)
    {
        $res = $this->db->query("select * from partidas where id in (
                                    select partida_id from jugadores where jugador = $id)");
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_tipos_juego()
    {
        $res = $this->db->query("select * from tipos_juego");
        
        return $res->result_array();
    }
        
    
    /*
     * 
     */
    function obtener_tipo_juego($id_partida)
    {
        $res = $this->db->query("select tipo_juego from partidas where id = $id_partida");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function obtener_tiposs_juego($id_partida)
    {
        $res = $this->db->query("select tipo_juego from partidas where id = $id_partida");
        $tipo = $res->row_array();
        $tipo = $res['tipo_juego'];
        
        $res = $this->db->query("select * form tipos_juego where id = $tipo");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function obtener_estados()
    {
        $res = $this->db->query("select * from estados");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function cambiar_estado($datos)
    {
        extract($datos);
        
        $this->db->query("update partidas set estado = $estado where id = $id_partida");
    }
    
    /*
     * 
     */
    function obtener_master($id_partida)
    {
        $res = $this->db->query("select master from partidas where id = $id_partida");
        
        $res = $res->row_array();
        
        return $res['master'];
    }
    
    
    /*
     * 
     */
    function obtener_jugadores($id_partida)
    {
        $res = $this->db->query("select * from jugadores where partida_id = $id_partida");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function activar_partida($id_partida)
    {
        $this->db->query("update partidas set activa = not activa where id = $id_partida");
    }
    
    
    /*
     * 
     */
    function obtener_partidas($limit, $offset = 0)
    {
        $res = $this->db->query("select * from partidas order by f_creacion limit $limit offset $offset");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_partidas_inicio()
    {
        $res = $this->db->query("select * from partidas order by f_creacion limit 4");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function anadir_jugador($id_partida, $jugador, $tipo_juego)
    {
        $tipo_juego = $this->Ficha->obtener_tipo_juego($id_partida);
        $tipo_ficha = $this->Ficha->obtener_tipo_ficha($tipo_juego);
        $id_ficha = $this->Ficha->inicializar_ficha($jugador, $tipo_ficha, $id_partida);
        
        $this->db->query("insert into jugadores (partida_id, jugador, ficha_id)
                            values ($id_partida, $jugador, $id_ficha)");
    }
    
    
    /*
     * 
     */
    function partida_activa($id_partida)
    {
        $res = $this->db->query("select activa from partidas where id = $id_partida");
        
        $res = $res->row_array();
        
        return $res['activa'];
    }
    
    
    /*
     * 
     */
    function obtener_estado($estado)
    {
        $res = $this->db->query("select estado from estados where id = $estado");
        
        $res = $res->row_array();
        
        return $res['estado'];
    }
    
    
    /*
     * 
     */
    function participa($usuario, $id_partida)
    {
        $res = $this->db->query("select * from fichas where usuario_id = $usuario and partida_id = $id_partida");
        
        $res = $res->row_array();
        
        if (count($res) > 0)
        {
            return TRUE;
        }
        else
        {
        	return FALSE;
        }
    }
    
    
    /*
     * 
     */
    function contar_partidas()
    {
        return $this->db->count_all_results('partidas');
    }
    
    
    
    
}