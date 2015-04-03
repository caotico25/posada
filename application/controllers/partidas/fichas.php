<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fichas extends CI_Controller
{
    /*
     * 
     */
    function obtener_ficha()
    {
        $juego = $this->input->post('juego');
        
        $ficha = $this->Ficha->obtener_ficha($juego);
        
        $cadena = file_get_contents($ficha);
        
        $datos = json_decode(utf8_encode($cadena));
        
        echo $datos;
    }
    
    // FALTA VALOR DE ID DE USUARIO/PERSONAJE
    function editar()
    {
        $tabla = $this->input->post('tabla');
        $columna = $this->input->post('columna');
        $valor = $this->input->post('valor');
        $ficha = $this->input->post('ficha');
        $partida = $this->input->post('partida');
        
        $this->Ficha->editar($tabla, $columna, $valor, $ficha);
        
        $data['id_partida'] = $partida;
        $data['ficha'] = $this->Ficha->obtener_datos_ficha($ficha);
        $data['inventario'] = $this->Ficha->obtener_inventario($ficha);
        $data['personaje'] = $this->Ficha->obtener_datos_personaje($ficha);
        $data['otra_info'] = $this->Ficha->obtener_otra_info($ficha);
        $data['atributos'] = $this->Ficha->obtener_atributos($ficha);
        $data['habilidades'] = $this->Ficha->obtener_habilidades($ficha);
        $data['ventajas'] = $this->Ficha->obtener_ventajas($ficha);
        $data['otros_parametros'] = $this->Ficha->obtener_otros_parametros($ficha);
        
        $this->load->view('partidas/ficha', $data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}