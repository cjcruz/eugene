<?php
class Promocion_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('promociones');
    return $query->result_array();
  }

  public function buscar_todos_para_dropdown(){
    $tiendas = $this->buscar_todos();
    $opciones = array();
    foreach ($tiendas as $tienda) {
      $opciones[ $tienda['id'] ] = $tienda['nombre'];
    }
    return $opciones;
  }
}