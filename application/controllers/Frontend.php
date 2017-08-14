<?php
require_once APPPATH . '/controllers/Backend_Controller.php';

class FrontEnd extends CI_Controller {

  public function __construct(){
    parent::__construct();
  }

  public function index(){
    $data['title'] = 'Tiendas';

    $this->load->view('frontend/index', $data);
  }

  public function consulta(){
    $this->load->model('Cliente_model');
    $this->load->model('Solicitud_model');

    $identifcacion = $this->input->get('ci');
    $data['cliente'] = $this->Cliente_model->buscar_por_identificacion($identifcacion);
    if($data['cliente'])
      $data['solicitudes'] = $this->Solicitud_model->buscar_por_cliente_id($data['cliente']->id);

    $data['resultados'] = $data['cliente'] && $data['solicitudes'];

    $this->load->view('frontend/_consulta', $data);
  }

}