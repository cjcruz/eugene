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

  public function addTienda($data){
    $this->db->insert('tiendas', $data);
  }

  public function captura($id){
    $datos = $this->buscar_todos();
    $opcion = array();
    foreach ($datos as $datos2) {
      if($datos2['id'] == $id){
        $d['id'] = $datos2['id'];
        $d['nombre'] = $datos2['nombre'];
        $d['ubicacion'] = $datos2['ubicacion'];
        $d['telefono'] = $datos2['telefono'];
        $d['email'] = $datos2['email'];
        $opcion[] = $d;
      }
    }
    return $opcion;
  }

  public function addUpdate(){
    $datos = array(
      'nombre' => $this->input->post('tiendas[nombre]'),
      'ubicacion' => $this->input->post('tiendas[ubicacion]'),
      'telefono' => $this->input->post('tiendas[telefono]'),
      'email' => $this->input->post('tiendas[email]'));
    $this->db->where('id',$this->input->post('tiendas[id]'));
    return $this->db->update('tiendas',$datos);
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