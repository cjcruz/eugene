<?php
class Cliente_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('clientes');
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