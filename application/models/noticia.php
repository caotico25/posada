<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticia extends CI_Model
{
    /*
     * 
     */
    function obtener_noticias($limit, $offset)
    {
        $res = $this->db->query("select * from noticias limit $limit offset $offset");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function obtener_noticias_inicio()
    {
        $res = $this->db->query("select * from noticias order by fecha limit 4");
        
        return $res->result_array();
    }
    
    
    /*
     * 
     */
    function escribir_noticia($datos)
    {
        extract($datos);
        
        $this->db->query("insert into noticias (titulo, autor, contenido)
                            values (?, $autor, ?)", array($titulo, $contenido));
    }
    
    
    /*
     * 
     */
    function modificar_noticia($datos)
    {
        extract($datos);
        
        $this->db->query("update noticias set titulo = ?, contenido = ? where id = $id_noticia", array($titulo, $contenido));
    }
    
    
    /*
     * 
     */
    function obtener_noticia($id_noticia)
    {
        $res = $this->db->query("select * from noticias where id = $id_noticia");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function eliminar($id_noticia)
    {
        $this->db->query("delete from noticias where id = $id_noticia");
    }
    
    
    /*
     * 
     */
    function obtener_autor($id_autor)
    {
        $res = $this->db->query("select usuario from usuarios where id = $id_autor");
        
        $res = $res->row_array();
        
        return $res['usuario'];
    }
    
    
    /*
     * 
     */
    function contar_noticias()
    {
        return $this->db->count_all_results('noticias');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}