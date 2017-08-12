<?php
class Cliente_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('clientes');
    return $query->result_array();
  }
}