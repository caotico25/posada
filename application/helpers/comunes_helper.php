<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('redir_sitio'))
{
    function redir_sitio($direccion = 'portal/inicio', $data = null)
    {
        $CI =& get_instance();
        
        $contenido = $CI->load->view($direccion, $data, TRUE);
        
        $data['contenido'] = $contenido;
        
        $CI->load->view('comunes/plantilla', $data);
    }
}

if (!function_exists('redir_admin'))
{
    function redir_admin($direccion = 'admin/inicio', $data = null)
    {
        $CI =& get_instance();
        
        $contenido = $CI->load->view($direccion, $data, TRUE);
        
        $data['contenido'] = $contenido;
        
        $CI->load->view('comunes/plantilla_admin', $data);
    }
}

if (!function_exists('obtener_nombre'))
{
    function obtener_nombre()
    {
        $CI =& get_instance();
        
        return $CI->session->userdata('user_login');
    }
}

if (!function_exists('obtener_id'))
{
    function obtener_id()
    {
        $CI =& get_instance();
        
        $usuario = $CI->session->userdata('user_login');
        
        return $CI->Usuario->obtener_id($usuario);
    }
}

if (!function_exists('es_admin'))
{
    function es_admin($id)
    {
        $CI =& get_instance();
        
        return $CI->Usuario->es_admin($id);
    }
}

if (!function_exists('logueado'))
{
    function logueado()
    {
        $CI =& get_instance();
        
        return $CI->Usuario->logueado();
    }
}

// Fin de comunes_helper
?>