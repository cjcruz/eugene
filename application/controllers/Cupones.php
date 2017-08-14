<?php

require_once APPPATH . '/controllers/Backend_Controller.php';

class Cupones extends Backend_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Solicitud_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'Clientes';
    $data['solicitudes'] = $this->Solicitud_model->buscar_todos();

    $this->load->view('layout/header', $data);
    $this->load->view('cupones/index', $data);
    $this->load->view('layout/footer');
  }

  public function nuevo(){
    $data = array();
    $data['title'] = 'Solicitud de cupones';
    $this->load->model('Tienda_model');
    $this->load->model('Promocion_model');
    $this->load->helper('form');
    $data['tiendas'] = $this->Tienda_model->buscar_todos_para_dropdown();
    $data['promociones'] = $this->Promocion_model->buscar_activos_para_dropdown();

    $this->load->view('layout/header', $data);
    $this->load->view('cupones/nuevo', $data);
    $this->load->view('layout/footer');
  }

  public function crear(){
    $cliente_id = $this->input->post('cliente_id');
    $promocion_id = $this->input->post('promocion_id');
    $facturas = $this->input->post('facturas');
    $solicitud_id = $this->Solicitud_model->guardar(array(
      'cliente_id' => $cliente_id,
      'promocion_id' => $promocion_id,
      'facturas' => $facturas
    ));
    if($solicitud_id){
      redirect(base_url()."cupones/mostrar/".$solicitud_id."?exito=1");
    }
  }

  public function mostrar($id){
    $this->load->model('Factura_model');
    $this->load->helper('form');

    $data['title'] = 'Ver Solicitud';
    $data['solicitud'] = $this->Solicitud_model->buscar_por_id($id);
    $data['facturas'] = $this->Factura_model->buscar_por_solicitud_id($id);
    $data['mostrar_exito'] = $this->input->get('exito')=='1';
    $data['mostrar_aprobacion'] = $this->input->get('aprobado')=='1';

    $this->load->view('layout/header', $data);
    $this->load->view('cupones/mostrar', $data);
    $this->load->view('layout/footer');
  }

  public function aprobar($solicitud_id){    
    if( $this->Solicitud_model->aprobar($solicitud_id) ){
      redirect(base_url()."cupones/mostrar/".$solicitud_id."?aprobado=1");
    }
  }


  public function crear_y_aprobar(){
    $cliente_id = $this->input->post('cliente_id');
    $promocion_id = $this->input->post('promocion_id');
    $facturas = $this->input->post('facturas');
    $solicitud_id = $this->Solicitud_model->guardar(array(
      'cliente_id' => $cliente_id,
      'promocion_id' => $promocion_id,
      'facturas' => $facturas
    ));
    if($solicitud_id && $this->Solicitud_model->aprobar($solicitud_id)){
      redirect(base_url()."cupones/mostrar/".$solicitud_id."?exito=1");
    }
  }
}