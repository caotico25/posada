<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion extends CI_Model
{
    function obtener_secciones()
    {
        $res = $this->db->query("select * from secciones");
        
        return $res->result_array();
    }
}
    