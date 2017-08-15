<?php
class Parqueoc_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('tbl_cparqueo');
    return $query->result_array();
  }
}