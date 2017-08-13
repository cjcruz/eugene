<?php
class Tienda_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('tiendas');
    return $query->result_array();
  }

  public function buscar_todos_para_dropdown(){
    $tiendas = $this->buscar_todos();
    $opciones = array();
    foreach ($tiendas as $tienda) {
      $item['id'] = $tienda['id'];
      $item['text'] = $tienda['nombre']; 
      $opciones[] = $item;
    }
    return $opciones;
  }
}