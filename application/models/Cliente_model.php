<?php
class Cliente_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->query('SELECT c.*, r1.cupones
      FROM eugene.clientes as c
      LEFT JOIN (
        SELECT s.cliente_id, sum(s.cupones) as cupones
        FROM eugene.solicitudes as s
        WHERE s.estado = "aprobado"
        GROUP BY s.cliente_id) AS r1 ON r1.cliente_id = c.id');
    return $query->result_array();
  }

  public function buscar_por_clave($clave){
    $query = $this->db->query('SELECT * 
      FROM eugene.clientes as c
      WHERE c.nombre like "%'.$clave.'%" or c.identificacion like "%'.$clave.'%"');

    return $query->result_array();
  }

  public function buscar_por_identificacion($identificacion){
    $this->db->where('identificacion', $identificacion);
    $query = $this->db->get('clientes');
    return $query->row(0);

  }
}