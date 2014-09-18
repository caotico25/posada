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


/*
 * 
 *  FUNCIONES REFERENTES AL USUARIO
 * 
 */

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

/*
 * 
 * FUNCIONES REFERENTES A PARTIDAS
 * 
 */

if (!function_exists('nombre_personaje'))
{
    function nombre_personaje($id_partida, $id_jugador)
    {
        $CI =& get_instance();
        
        $nombre = $CI->Ficha->nombre_personaje($id_partida, $id_jugador);
        
        return $nombre['nombre'];
    }
}

if (!function_exists('nombre_master'))
{
    function nombre_master($id_master)
    {
        $CI =& get_instance();
        
        $nombre = $CI->Ficha->nombre_master($id_master);
        
        return $nombre['nombre'];
    }
}

if (!function_exists('es_master'))
{
    function es_master($id_jugador, $id_partida)
    {
        $CI =& get_instance();
        
        $master = $CI->Partida->es_master($id_jugador, $id_partida);
        
        return $id_jugador == $master;
    }
}

if (!function_exists('obtener_jugadores'))
{
    function obtener_jugadores($id_partida)
    {
        $CI =& get_instance();
        
        return $CI->Partida->obtener_jugadores($id_partida);
    }
}

if (!function_exists('partida_activa'))
{
    function partida_activa($id_partida)
    {
        $CI =& get_instance();
        
        return $CI->Partida->partida_activa($id_partida);
    }
}

if (!function_exists('obtener_autor'))
{
    function obtener_autor($id_autor)
    {
        $CI =& get_instance();
        
        return $CI->Foro->obtener_autor($id_autor);
    }
}

if (!function_exists('obtener_estado'))
{
    function obtener_estado($id_estado)
    {
        $CI =& get_instance();
        
        return $CI->Partida->obtener_estado($id_estado);
    }
}

if (!function_exists('obtener_tipo_juego'))
{
    function obtener_tipo_juego($tipo_juego)
    {
        $CI =& get_instance();
        
        $res = $CI->Partida->obtener_tipo_juego($tipo_juego);
        
        return $res['nombre'];
    }
}


/*
 * 
 * FUNCIONES REFERENTES A LAS NOTICIAS
 * 
 */

if (!function_exists('obtener_autor'))
{
    function obtener_autor($id_autor)
    {
        $CI =& get_instance();
        
        return $CI->Noticia->obtener_autor($id_autor);
    }
}
 
 
 

// Fin de comunes_helper
?>