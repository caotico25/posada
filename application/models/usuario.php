<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model
{
    /*
     * Funcion que devuelve el id del usuario indicado.
     * 
     * @param string $usuario Nombre del usuario.
     * 
     * @return int El id del usuario.
     */
    function obtener_id($usuario)
    {
        $res = $this->db->query("select * from usuarios where usuario = ?", array($usuario));
        
        $res = $res->row_array();
        
        return $res['id'];
    }
    
    
    /*
     * 
     */
    function password_valido($pass, $usuario)
    {
        $res = $this->db->query("select * from usuarios
                               where passwd = md5(?) and usuario = ?",
                               array($pass, $usuario));
      
      return $res->num_rows() > 0;
    }
    
    
    /*
     * 
     */
    function es_admin($id)
    {
        $res = $this->db->query("select * from usuarios
                                    where id = $id and admin = true");

        return $res->num_rows > 0;
    }
    
    
    /*
     * 
     */
    function logueado()
    {
        return $this->session->userdata('id_login') != FALSE;
    }
    
    
    /*
     * 
     */
    function comprobar_usuario($usuario)
    {
        $res = $this->db->query("select * from usuarios
                                where usuario = ?", array($usuario));
                           
        return $res->num_rows() > 0;
    }
    
    
    /*
     * 
     */
    function alta($datos)
    {
        extract($datos);
        
        $this->db->query("insert into usuarios (usuario, email, passwd)
                            values (?, ?, md5(?))", array($usuario, $email, $password));
    }
    
    
    /*
     * 
     */
    function cambio_passwd($passwd)
    {
        $id_usuario = obtener_id();
        
        $this->db->query("update usuarios set passwd = ? where id = $id_usuario", array($passwd));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}    