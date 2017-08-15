<?php
class Solicitud_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }

  public function buscar_todos(){
    $query = $this->db->query('SELECT s.id, s.estado, s.fecha_creacion as fecha, c.nombre as cliente, r1.numero_de_facturas, r1.total, s.cupones 
        FROM eugene.solicitudes as s
        INNER JOIN eugene.clientes as c on c.id = s.cliente_id
        LEFT JOIN (
          SELECT f.solicitud_id, count(*) as numero_de_facturas, sum(total) as total  
          FROM eugene.facturas as f
          group by f.solicitud_id
        ) as r1 on r1.solicitud_id = s.id
        ORDER BY s.fecha_creacion DESC');

    return $query->result_array();
  }

  public function buscar_10_ultimas(){
    $query = $this->db->query('SELECT s.id, s.estado, s.fecha_creacion as fecha, c.nombre as cliente, r1.numero_de_facturas, r1.total 
                  FROM eugene.solicitudes as s
                  INNER JOIN eugene.clientes as c on c.id = s.cliente_id
                  LEFT JOIN (
                    SELECT f.solicitud_id, count(*) as numero_de_facturas, sum(total) as total  
                    FROM eugene.facturas as f
                    group by f.solicitud_id
                  ) as r1 on r1.solicitud_id = s.id
          ORDER BY s.fecha_creacion DESC
          LIMIT 10');

    return $query->result_array();
  }

  public function buscar_por_id($id){
    $query = $this->db->query('SELECT s.id, s.estado, s.cupones, s.fecha_creacion as fecha, c.nombre as cliente, r1.numero_de_facturas, r1.total, p.nombre as promocion, s.promocion_id 
        FROM eugene.solicitudes as s
        INNER JOIN eugene.clientes as c on c.id = s.cliente_id
        INNER JOIN eugene.promociones as p on p.id = s.promocion_id
        LEFT JOIN (
          SELECT f.solicitud_id, count(*) as numero_de_facturas, sum(total) as total  
          FROM eugene.facturas as f
          group by f.solicitud_id
        ) as r1 on r1.solicitud_id = s.id
        WHERE s.id = '.$id);
    return $query->row(0);
  }

  public function buscar_por_cliente_id($id){
    $query = $this->db->query('SELECT s.id, s.estado, s.cupones, s.fecha_creacion as fecha, c.nombre as cliente, r1.numero_de_facturas, r1.total, p.nombre as promocion 
        FROM eugene.solicitudes as s
        INNER JOIN eugene.clientes as c on c.id = s.cliente_id
        INNER JOIN eugene.promociones as p on p.id = s.promocion_id
        LEFT JOIN (
          SELECT f.solicitud_id, count(*) as numero_de_facturas, sum(total) as total  
          FROM eugene.facturas as f
          group by f.solicitud_id
        ) as r1 on r1.solicitud_id = s.id
        WHERE s.cliente_id = '.$id);
    return $query->result_array();
  }

  public function guardar($data){
    date_default_timezone_set('America/Guayaquil');
    $fecha_creacion = date("Y-m-d H:i:s");
    $respuesta = $this->db->insert('solicitudes', array(
      'cliente_id' => $data['cliente_id'],
      'promocion_id' => $data['promocion_id'],
      'estado' => 'pendiente',
      'creado_por_id' => $this->auth_user_id,
      'fecha_creacion' => $fecha_creacion,
      'fecha_modificacion' => $fecha_creacion
    ));

    if(!$respuesta) return false;

    $solicitud_id = $this->db->insert_id();
    $facturas = $data['facturas'];

    $data_comun = array(
      'solicitud_id' => $solicitud_id,
      'fecha_creacion' => $fecha_creacion,
      'fecha_modificacion' => $fecha_creacion
    );
    array_walk($facturas, function(&$factura, $index, $data){
      $factura['solicitud_id'] = $data['solicitud_id'];
      $factura['fecha_creacion'] = $data['fecha_creacion'];
      $factura['fecha_modificacion'] = $data['fecha_creacion'];
    }, $data_comun);

    $respuesta = $this->db->insert_batch('facturas', $facturas);

    if($respuesta > 0){
      return $solicitud_id;
    }
    return NULL;
  }

  public function calcularCupones($solicitud_id){
    $this->load->model('Promocion_model');
    $solicitud = $this->buscar_por_id($solicitud_id);
    $promocion = $this->Promocion_model->buscar_por_id($solicitud->promocion_id);

    $n = intval($solicitud->total / $promocion->valor_cupon);
    return $n;
  }

  public function aprobar($solicitud_id){
    $numero_cupones = $this->calcularCupones($solicitud_id, 10);
    $data = array(
      'estado' => 'aprobado',
      'cupones' => $numero_cupones
    );

    $this->db->where('id', $solicitud_id);
    return $this->db->update('solicitudes', $data);
  }
}