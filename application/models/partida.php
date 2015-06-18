<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partida extends CI_Model
{
    /**
     * CREA UNA NUEVA PARTIDA
     * 
     * @param array $datos Datos de la nueva partida
     */
    function nueva_partida($datos)
    {
        extract($datos);
        
        $this->db->query("insert into partidas (nombre, descripcion, master, tipo_juego, estado)
                            values (upper(?), ?, $master, $tipo_juego, ?)", array($nombre, $descripcion, $estado));
                            
        $id_partida = $this->db->insert_id();
                            
        if (count($jugadores) > 0)
        {
            for ($i = 0; $i < count($jugadores); $i++)
            {
                $this->anadir_jugador($id_partida, $jugadores[$i], $tipo_juego);
            }
        }
    }
    
    
    /**
     * OBTIENE LAS PARTIDAS EN LAS QUE EL USUARIO ES MASTER
     * 
     * @param integer $id ID del usuario
     * 
     * @return array Lista de partidas en las que el usuario es master
     */
    function partidas_master($id)
    {
        $res = $this->db->query("select * from partidas where master = $id and estado <> 4");
        
        return $res->result_array();
    }
    
    
    /**
     * OBTIENE LAS PARTIDAS EN LAS QUE PARTICIPA EL USUARIO
     * 
     * @param integer $id ID del usuario
     * 
     * @return array Lista de partidas en las  que el usuario participa
     */
    function partidas_player($id)
    {
        $res = $this->db->query("select * from partidas where id in (
                                    select partida from fichas where usuario = $id) and estado <> 4");
        return $res->result_array();
    }
    
    
    /**
     * DEVUELVE LAS PARTIDAS EN LAS QUE HA PARTICIPADO Y HAN FINALIZADO
     * 
     * @param integer $id ID del usuario
     * 
     * @return array Lista de partidas finalizadas en las que ha participado el usuario
     */
    function partidas_finalizadas($id)
    {
        $res = $this->db->query("select * from partidas where master = $id or id in (
                                    select partida from fichas where jugador = $id) and estado = 4");
        
        return $res->result_array();
    }
    
    
    /**
     * DEVUELVE LOS TIPOS DE JUEGO EXISTENTES
     * 
     * @return array Lista de tipos de juego
     */
    function obtener_tipos_juego()
    {
        $res = $this->db->query("select * from tipos_juego");
        
        return $res->result_array();
    }
        
    
    /**
     * OBTIENE EL TIPO DE JUEGO DE LA PARTIDA INDICADA
     * 
     * @param integer $id_partida ID de la partida
     * 
     * @return array ID del tipo de juego
     */
    function obtener_tipo_juego($id_partida)
    {
        $res = $this->db->query("select tipo_juego from partidas where id = $id_partida");
        
        return $res->row_array();
    }
    
    
    /**
     * DEVUELVE EL NOMBRE DEL TIPO DE JUEGO
     * 
     * @param integer $tipo ID del tipo de juego
     * 
     * @return array Nombre del tipo de juego
     */
    function tipo_juego($tipo)
    {
        $res = $this->db->query("select * from tipos_juego where id = $tipo");
        
        return $res->row_array();
    }
    
    
    /**
     * DEVUELVE LOS ESTADOS EXISTENTES PARA UNA PARTIDA
     * 
     * @return array Lista con los estados existentes
     */
    function obtener_estados()
    {
        $res = $this->db->query("select * from estados");
        
        return $res->result_array();
    }
    
    
    /**
     * CAMBIA EL ESTADO DE UNA PARTIDA
     * 
     * @param array $datos IDs de la partida y del nuevo estado
     */
    function cambiar_estado($datos)
    {
        extract($datos);
        
        $this->db->query("update partidas set estado = $estado where id = $id_partida");
    }
    
    /**
     * DEVUELVE EL ID DEL MASTER DE LA PARTIDA INDICADA
     * 
     * @param integer $id_partida ID de la partida
     * 
     * @return integer ID del master
     */
    function obtener_master($id_partida)
    {
        $res = $this->db->query("select master from partidas where id = $id_partida");
        
        $res = $res->row_array();
        
        return $res['master'];
    }
    
    
    /**
     * OBTIENE LOS JUGADORES DE UNA PARTIDA
     * 
     * @param integer $id_partida ID de la partida
     * 
     * @return array Lista con los IDs de los jugadores de la partida
     */
    function obtener_jugadores($id_partida)
    {
        $res = $this->db->query("select * from fichas where partida = $id_partida");
        
        return $res->result_array();
    }
    
    
    /**
     * ACTIVA O DESACTIVA LA PARTIDA CUANDO EL MASTER ENTRA O SALE RESPECTIVAMENTE EN LA PARTIDA
     * 
     * @param integer $id_partida ID de la partida
     */
    function activar_partida($id_partida)
    {
        $this->db->query("update partidas set activa = not activa where id = $id_partida");
    }
    
    
    /**
     * OBTIENE TODAS LAS PARTIDAS PAGINADAS
     * 
     * @param integer $limit Número de elementos por página
     * @param integer $offset Número de la página a mostrar
     * 
     * @return array Lista con las partidas a mostrar
     */
    function obtener_partidas($limit, $offset = 0)
    {
        $res = $this->db->query("select * from partidas order by f_creacion limit $limit offset $offset");
        
        return $res->result_array();
    }
    
    
    /**
     * OBTIENE LA LISTA DE PARTIDAS A MOSTRAR EN LA PAGINA DE INICIO
     * 
     * @return array Lista con las últimas partidas añadidas a mostrar
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
        $ficha_base = $this->Ficha->obtener_tipo_ficha($tipo_juego);
        
        $this->db->query("insert into fichas (usuario, partida)
                            values ($jugador, $id_partida)");
                            
        $id_ficha = $this->db->insert_id();
        
        
        $this->Ficha->inicializar_ficha($jugador, $ficha_base, $id_ficha);
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
    
    
    /*
     * 
     */
    function finalizar_partida($id_partida)
    {
        $this->db->query("update partidas set estado = 4, f_fin = current_date where id = $id_partida");
    }
    
    
    
    
    
    
    
    
}