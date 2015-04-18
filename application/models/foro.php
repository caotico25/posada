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
    function alta_tema($datos)
    {
        extract($datos);
        
        $this->db->query("insert into temas (titulo, descripcion, seccion)
                            values (?, ?, $seccion)", array($nombre, $contenido));
    }
    
    
    
    /*
     * 
     */
    function mod_tema($datos)
    {
        extract($datos);
        
        $this->db->query("update temas
                            set titulo = ?, descripcion = ?, seccion= ?
                            where id = $tema", array($nombre, $descripcion, $seccion_tema));
    }
    
    
    
    /*
     * 
     */
    function eliminar_tema($id)
    {
        $this->db->query("delete from temas
                            where id = $id");
    }
    
    
    
    /*
     * 
     */
    function obtener_temas()
    {
        $res = $this->db->query("select * from temas");
        
        return $res->result_array();
    }
    
    /*
     * 
     */
    function nombre_tema($id_tema)
    {
        $res = $this->db->query("select titulo from temas where id = $id_tema");
        
        return $res->row_array();
    }
    
    /*
     * 
     */
    function posts_de($id_tema)
    {
        $res = $this->db->query("select * from posts where tema = $id_tema");
        
        return $res->result_array();
    }
    
    /*
     * 
     */
    function nuevo_post($datos, $autor)
    {
        extract($datos);
        
        $this->db->query("insert into posts (titulo, contenido, autor, tema)
                         values (?, ?, ?, ?)", array($titulo, $contenido, $autor, $id_tema));
    }
    
    /*
     * 
     */
    function datos_post($id_post)
    {
        $res = $this->db->query("select * from posts where id = $id_post");
        
        return $res->row_array();
    }
    
    /*
     * 
     */
    function id_post($titulo_post)
    {
        $res = $this->db->query("select * from posts where titulo = '$titulo_post'");
        
        return $res->row_array();
    }
    
    /*
     * 
     */
    function contar_comentarios_de($id_post)
    {
        $res = $this->db->query("select count(id) as total from comentarios where tema = $id_post");
        
        $res = $res->result_row();
        
        return $res['total'];
    }
     
     /*
     * 
     */
    function comentarios_de($id_post)
    {
        $res = $this->db->query("select * from comentarios where post = $id_post");
        
        return $res->result_array();
    }
    
    /*
     * 
     */
    function nuevo_comentario($datos, $autor)
    {
        extract($datos);
        
        $this->db->query("insert into comentarios (contenido, autor, post)
                         values (?, ?, ?)", array($contenido, $autor, $id_post));
    }
    
    
    /*
     * 
     */
    function obtener_autor($autor)
    {
        $res = $this->db->query("select usuario from usuarios where id = $autor");
        $res = $res->row_array();
        
        return $res['usuario'];
    }
    
    
    /*
     * 
     */
    function info_seccion($id_seccion)
    {
        $res = $this->db->query("select * from secciones where id = $id_seccion");
        
        return $res->row_array();
    }
    
    
    /*
     * 
     */
    function info_tema($id_tema)
    {
        $res = $this->db->query("select * from temas where id = $id_tema");
        
        return $res->row_array();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}    