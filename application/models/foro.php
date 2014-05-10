<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foro extends CI_Model
{
    /*
     * 
     */
    function alta_seccion($datos)
    {
        extract($datos);
        
        $this->db->query("insert into secciones (titulo, descripcion)
                            values (?, ?)", array($nombre, $descripcion));
    }
    
    
    
    /*
     * 
     */
    function mod_seccion($datos)
    {
        extract($datos);
        
        $this->db->query("update secciones
                            set titulo = ?, descripcion = ?
                            where id = $seccion", array($nombre, $descripcion));
    }
    
    
    
    /*
     * 
     */
    function eliminar_seccion($id)
    {
        $this->db->query("delete from secciones
                            where id = $id");
    }
    
    
    
    /*
     * 
     */
    function obtener_secciones()
    {
        $res = $this->db->query("select * from secciones");
        
        return $res->result_array();
    }
    
    
    
    /*
     * 
     */
    function obtener_temas()
    {
        $res = $this->db->query("select * from temas");
        
        return $res->result_array();
    }
}    