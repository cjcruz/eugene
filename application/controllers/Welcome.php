<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/controllers/Backend_Controller.php';

class Welcome extends Backend_Controller {

  public function __construct(){
    parent::__construct();    
  }

  private function _calcularRangoDeFechas(){
    date_default_timezone_set('America/Guayaquil');
    $fechas = array();
    for($i=0; $i<7; $i++){
      $fechas[] = date('Y-m-d', strtotime("-".$i." days"));
    }
    return $fechas;
  }

  private function _calcularRangoDeVentas($fechas){    
    $this->load->model('Factura_model');
    $ventas = array();
    foreach ($fechas as $fecha) {
      $ventas[] = $this->Factura_model->calcular_venta_por_dia($fecha);
    }
    return $ventas;
  }

  private function _calcularEtiquetasDeFechas($fechas){
    date_default_timezone_set('America/Guayaquil');
    $dias_nombres = array(
      'Sun' => 'Dom',
      'Sat' => 'Sáb',
      'Fri' => 'Vier',
      'Thu' => 'Jue',
      'Wed' => 'Mier',
      'Tue' => 'Mar',
      'Mon' => 'Lun'
    );

    $meses_nombres = array(
      'Ene',
      'Feb',
      'Mar',
      'Abr',
      'May',
      'Jun',
      'Jul',
      'Ago',
      'Sep',
      'Oct',
      'Nov',
      'Dic'
    );
    
    $etiquetas = array();
    foreach ($fechas as $fecha) {
      $fecha = date_create($fecha);
      $dia_nombre = date_format($fecha, 'D');
      $mes = date_format($fecha, 'n') - 1;
      $dia_numero = date_format($fecha, 'd');
      $etiquetas[] = $dias_nombres[$dia_nombre].' '.$dia_numero.'-'.$meses_nombres[$mes];
    }
    return $etiquetas;
  }

  public function index(){
    $this->load->model('Solicitud_model');

    $query_facturas = $this->db->query('SELECT count(f.id) as facturas 
      FROM eugene.facturas as f
      INNER JOIN eugene.solicitudes as s on s.id = f.solicitud_id
      WHERE s.estado = "aprobado"');

    $query_cupones = $this->db->query('SELECT sum(s.cupones) as cupones 
      FROM eugene.solicitudes as s
      WHERE s.estado = "aprobado"');

    $query_ventas = $this->db->query('SELECT sum(f.total) as ventas 
      FROM eugene.facturas as f
      INNER JOIN eugene.solicitudes as s on s.id = f.solicitud_id
      WHERE s.estado = "aprobado"');

    $query_clientes = $this->db->query('SELECT count(id) as clientes FROM eugene.clientes');
      
    $facturas = $query_facturas->row(0)->facturas;
    $cupones = $query_cupones->row(0)->cupones;
    $ventas = $query_ventas->row(0)->ventas;
    $clientes = $query_clientes->row(0)->clientes;

    $data['solicitudes'] = $this->Solicitud_model->buscar_10_ultimas();

    $data['facturas'] = $facturas;
    $data['cupones'] = $cupones;
    $data['ventas'] = $ventas;
    $data['clientes'] = $clientes;

    $fechas = $this->_calcularRangoDeFechas();
    $data['grafico_x'] = $this->_calcularEtiquetasDeFechas($fechas);
    $data['grafico_y'] = $this->_calcularRangoDeVentas($fechas);

    $data['grafico_x'] = array_reverse($data['grafico_x']);
    $data['grafico_y'] = array_reverse($data['grafico_y']);


    $data['title'] = 'Tablero';
    
    $this->load->view('layout/header', $data);
    $this->load->view('welcome_message', $data);
    $this->load->view('layout/footer', $data);
  }
}
