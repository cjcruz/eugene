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


  public function ranking_de_ventas(){
    $query = $this->db->query('SELECT t.id as tienda_id, t.nombre as tienda, sum(f.total) as ventas
        FROM eugene.facturas as f
        INNER JOIN eugene.tiendas as t on t.id = f.tienda_id
        INNER JOIN eugene.solicitudes as s on s.id = f.solicitud_id
        WHERE s.estado = "aprobado"
        GROUP BY t.id, t.nombre
        ORDER BY ventas DESC');
    return $query->result_array();
  }
}