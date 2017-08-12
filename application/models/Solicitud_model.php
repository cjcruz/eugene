<?php
class Solicitud_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->get('solicitudes');
    return $query->result_array();
  }
}