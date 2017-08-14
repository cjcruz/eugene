<?php
class Promocion_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->query('SELECT p.*, count(s.id) as numero_de_solicitudes 
      FROM eugene.promociones as p
      LEFT JOIN eugene.solicitudes as s on s.promocion_id = p.id
      GROUP BY p.id');

    return $query->result_array();
  }

  public function buscar_por_id($promocion_id){
    $query = $this->db->query('SELECT p.*, count(s.id) as numero_de_solicitudes 
      FROM eugene.promociones as p
      LEFT JOIN eugene.solicitudes as s on s.promocion_id = p.id
      WHERE p.id = '.$promocion_id.' GROUP BY p.id');

    return $query->row(0);
  }

  public function buscar_todos_para_dropdown(){
    $tiendas = $this->buscar_todos();
    $opciones = array();
    foreach ($tiendas as $tienda) {
      $opciones[ $tienda['id'] ] = $tienda['nombre'];
    }
    return $opciones;
  }

  public function buscar_activos_para_dropdown(){
    $promociones = $this->buscar_todos();
    $opciones = array();
    foreach ($promociones as $promocion) {
      if($promocion['estado'] != 'activo') continue;
      $opciones[ $promocion['id'] ] = $promocion['nombre'];
    }
    return $opciones;
  }

  public function guardar($data){
    $fecha_creacion = date("Y-m-d H:i:s");
    $data['estado'] = 'activo';
    $data['fecha_creacion'] = $fecha_creacion;
    $data['fecha_modificacion'] = $fecha_creacion;
    $data['creado_por_id'] = $this->auth_user_id;
    return $this->db->insert('promociones', $data);
  }

  public function finalizar($promocion_id){    
    date_default_timezone_set('America/Guayaquil');
    $fecha_creacion = date("Y-m-d H:i:s");
    $data = array(
      'estado' => 'finalizado',
      'finalizado_por_id' => $this->auth_user_id,
      'fecha_finalizacion' => $fecha_creacion
    );

    $this->db->where('id', $promocion_id);
    return $this->db->update('promociones', $data);
  }
}