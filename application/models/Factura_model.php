<?php
class Factura_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->query('SELECT f.*, t.nombre as tienda 
        FROM eugene.facturas as f
        INNER JOIN eugene.tiendas as t on t.id = f.tienda_id
        INNER JOIN eugene.solicitudes as s on s.id = f.solicitud_id
        WHERE s.estado = "aprobado"');
    return $query->result_array();
  }

  public function buscar_por_solicitud_id($solicitud_id){
    $query = $this->db->query('SELECT f.*, t.nombre as tienda
      FROM eugene.facturas as f
      INNER JOIN eugene.tiendas as t on t.id = f.tienda_id
      WHERE f.solicitud_id = '.$solicitud_id);

    return $query->result_array();
  }

  public function calcular_venta_por_dia($fecha){
    $query = $this->db->query('SELECT sum(f.total) as venta
      FROM eugene.facturas as f
      INNER JOIN eugene.solicitudes as s on s.id = f.solicitud_id
      WHERE s.estado = "aprobado" AND f.fecha_emision = "'.$fecha.'"');
    $respuesta = $query->row(0);
    if($respuesta->venta) return floatval($respuesta->venta);
    return 0.0;
  }
}