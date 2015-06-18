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
    
    
    /**
     * 
     */
    function crear_categoria($datos)
    {
        extract($datos);
        
        $con = $this->load->dbforge();
        
        $con->add_key('id', TRUE);
        
        $campos = array(
                        'campo' => array(
                                    'type' => 'varchar',
                                    'constraint' => '100'
                                    ),
                        
                        'valor' => array(
                                    'type' => 'varchar',
                                    'constraint' => '100'
                                    ),
                         
                        'subcategoria' => array(
                                    'type' => 'varchar',
                                    'constraint' => '100'
                                    ),
                        
                        'ficha' => array(
                                    'type' => 'int',
                                    'constraint' => '11'
                                    )
                    );
        
        $con->add_field($campos);
        
        $con->create_table($categoria);
        
        $res = $this->db->query("select * from tipos_juego where id = $tipo_juego");
        $res = $res->row_array();
        
        $this->db->query("insert into tablas_ficha (nombre, ficha) values (?, ?)", array($categoria, $res['ficha_base']));
    }
    
    
    /*
     * 
     */
    function crear_campo($datos)
    {
        extract($datos);
        
        $res = $this->db->query("select * from tipos_juego where id = $tipo_juego");
        $res = $res->row_array();
        
        $this->db->query("insert into " + $categoria + " (campo, ficha) values (?, ?, ?)", array($campo, $res['ficha_base']));
    }
    
    
    /*
     * 
     */
    function crear_campo_sub($datos)
    {
        extract($datos);
        
        $res = $this->db->query("select * from tipos_juego where id = $tipo_juego");
        $res = $res->row_array();
        
        $this->db->query("insert into " + $categoria + " (campo, dubcategoria, ficha) values (?, ?, ?)", array($campo, $subcategoria, $res['ficha_base']));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}    