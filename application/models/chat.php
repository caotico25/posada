<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Model
{
    /*
     * 
     */
    function obtener_mensajes($id_partida)
    {
        $res = $this->db->query("select * from chat where partida = $id_partida and mensaje <> '' order by momento desc limit 15");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function insertar_mensaje($datos)
    {
        extract($datos);
        
        if ($mensaje == '')
        {
            $mensaje = NULL;
        }
        
        $this->db->query("insert into chat (mensaje, jugador, partida)
                            values (?, $jugador, $partida)", array($mensaje));
    }
    
    
    
    
}
    