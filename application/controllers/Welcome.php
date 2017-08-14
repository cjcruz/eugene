<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/controllers/Backend_Controller.php';

class Welcome extends Backend_Controller {

  public function __construct(){
    parent::__construct();    
  }

  public function index(){

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

    $data['facturas'] = $facturas;
    $data['cupones'] = $cupones;
    $data['ventas'] = $ventas;
    $data['clientes'] = $clientes;
    
    $data['title'] = 'Dashboard';
    
    $this->load->view('layout/header', $data);
    $this->load->view('welcome_message', $data);
    $this->load->view('layout/footer', $data);
  }
}
