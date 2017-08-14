<?php

require_once APPPATH . '/controllers/Backend_Controller.php';

class Promociones extends Backend_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Promocion_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'Promociones';
    $data['promociones'] = $this->Promocion_model->buscar_todos();

    $this->load->view('layout/header', $data);
    $this->load->view('promociones/index', $data);
    $this->load->view('layout/footer');
  }

  public function nuevo(){
    $data['title'] = 'Promociones - Nuevo';
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('promociones/nuevo', $data);
    $this->load->view('layout/footer');
  }

  public function crear(){
    $datos = $this->input->post('promocion');

    $promotion_id = $this->Promocion_model->guardar($datos);
    if($promotion_id){
      redirect(site_url('promociones/')."?exito=1");
    }

    echo('error mientras se realiza insercion');
  }

  public function mostrar($promocion_id){    
    $this->load->helper('form');
    $data = array(
      'title' => 'Promoción',
      'promocion' => $this->Promocion_model->buscar_por_id($promocion_id)
    );
    $this->load->view('layout/header', $data);
    $this->load->view('promociones/mostrar', $data);
    $this->load->view('layout/footer');
  }

  public function finalizar($promocion_id){
    if( $this->Promocion_model->finalizar($promocion_id) ){
      redirect(base_url()."promociones/mostrar/".$promocion_id."?finalizado=1");
    }
  }

}