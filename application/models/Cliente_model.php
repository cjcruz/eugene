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

  public function addCliente($data){
    $this->db->insert('clientes', $data);
  }

  public function captura($id){
    $datos = $this->buscar_todos();
    $opcion = array();
    foreach ($datos as $datos2) {
      if($datos2['id'] == $id){
        $d['id'] = $datos2['id'];
        $d['nombre'] = $datos2['nombre'];
        $d['identificacion'] = $datos2['identificacion'];
        $d['telefono'] = $datos2['telefono'];
        $d['direccion'] = $datos2['direccion'];
        $d['email'] = $datos2['email'];
        $opcion[] = $d;
      }
    }
    return $opcion;
  }

  public function addUpdate(){
    $datos = array(
      'nombre' => $this->input->post('clientes[nombre]'),
      'identificacion' => $this->input->post('clientes[identificacion]'),
      'telefono' => $this->input->post('clientes[telefono]'),
      'direccion' => $this->input->post('clientes[direccion]'),
      'email' => $this->input->post('clientes[email]'));
    $this->db->where('id',$this->input->post('clientes[id]'));
    return $this->db->update('clientes',$datos);
  }
}