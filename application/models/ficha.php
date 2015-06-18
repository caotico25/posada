<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha extends CI_Model
{
    /*
     * 
     */
    function obtener_ficha($juego)
    {
        $res = $this->db->query("select ficha from tipos_ficha where tipo_juego = (
                                                select id from tipos_juego where upper(nombre) = upper($juego))");
        
        $res = $res->row_array();
        
        return $res['ficha'];
    }
    
    
    /*
     * 
     */
    function id_ficha_base($tipo_juego)
    {
        $res = $this->db->query("select ficha from tipos_ficha where tipo_juego = $tipo_juego");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function obtener_datos_ficha($id_ficha)
    {
        $res = $this->db->query("select * from fichas where id = $id_ficha");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function obtener_inventario($id_ficha)
    {
        $res = $this->db->query("select * from inventarios where id = $id_ficha");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_datos_personaje($id_ficha)
    {
        $res = $this->db->query("select * from personajes where ficha = $id_ficha");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function obtener_otra_info($id_ficha)
    {
        $res = $this->db->query("select * from otra_info where ficha = $id_ficha order by id");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_atributos($id_ficha)
    {
        $res = $this->db->query("select id, nombre, valor, categoria, ficha from atributos where ficha = $id_ficha group by id, categoria");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_habilidades($id_ficha)
    {
        $res = $this->db->query("select id, nombre, valor, categoria, ficha from habilidades where ficha = $id_ficha group by id, categoria");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_ventajas($id_ficha)
    {
        $res = $this->db->query("select id, nombre, valor, categoria, ficha from ventajas where ficha = $id_ficha group by id, categoria");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_otros_parametros($id_ficha)
    {
        $res = $this->db->query("select id, nombre, valor, categoria, ficha from otros_parametros where ficha = $id_ficha group by id, categoria");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function editar($tabla, $columna, $valor, $ficha)
    {
        if ($columna != 'nombre')
        {
            $this->db->where('nombre', $columna);
            
            $columna = 'valor';
        }
        
        $data = array(
            $columna => $valor
        );
        
        $this->db->where('ficha', $ficha);
        
        $this->db->update($tabla, $data);
    }
    
    
    /*
     * 
     */
    function nombre_personaje($id_partida, $id_jugador)
    {
        $res = $this->db->query("select ficha_id from jugadores where partida_id = $id_partida and jugador = $id_jugador");
        $res = $res->row_array();
        $ficha = $res['ficha_id'];
        
        if ($ficha != NULL)
        {
            $res = $this->db->query("select nombre from personajes where ficha = $ficha");
        
            return $res->row_array();
        }
        else
        {
            return null;
        }
        
    }
    
    
    /*
     * 
     */
    function inicializar_ficha($jugador, $ficha_base, $id_ficha)
    {
        $this->db->query("insert into anotaciones (ficha, texto) values ($id_ficha, '')");
        
        return $id_ficha;
    }
    
    
    /*
     * 
     */
    function obtener_tipo_juego($id_partida)
    {
        $res = $this->db->query("select tipo_juego from partidas where id = $id_partida");
        $res = $res->row_array();
        
        return $res['tipo_juego'];
    }
    
    
    /*
     * 
     */
    function obtener_tipo_ficha($tipo_juego)
    {
        $res = $this->db->query("select ficha_base from tipos_juego where id = $tipo_juego");
        $res = $res->row_array();
        
        return $res['ficha_base'];
    }
    
    
    /*
     * 
     */
    function obtener_id_ficha($jugador, $id_partida)
    {
        $res = $this->db->query("select ficha_id from jugadores where jugador = $jugador and partida_id = $id_partida");
        $res = $res->row_array();
        
        return $res['ficha_id'];
    }
    
    
    /*
     * 
     */
    function nombre_master($master)
    {
        $res = $this->db->query("select usuario from usuarios where id = $master");
        
        return $res->row_array();
    }
    
    
    
    
    
}
    