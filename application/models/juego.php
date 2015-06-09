<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juego extends CI_Model
{
    
    /**
     * 
     */
    function nuevo_juego($datos)
    {
        extract($datos);
        
        // CREAMOS UNA NUEVA FICHA PARA EL TIPO DE JUEGO A CREAR
        $this->db->query("insert into fichas (usuario_id) values (null)");
        $ficha = $this->db->insert_id();
        
        // CREAMOS EL TIPO DE JUEGO
        $this->db->query("insert into tipos_juego (nombre, descripcion, ficha_base) 
                            values (?, ?, $ficha)", array($nombre, $descripcion));
        
        return $this->db->insert_id();
    }
}    