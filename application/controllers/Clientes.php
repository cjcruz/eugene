<?php

require_once APPPATH . '/controllers/Backend_Controller.php';

class Clientes extends Backend_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Cliente_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'Clientes';
    $data['clientes'] = $this->Cliente_model->buscar_todos();
    $this->load->view('layout/header', $data);
    $this->load->view('clientes/index', $data);
    $this->load->view('layout/footer');
  }

  public function listar_para_ajax_drowpdown(){
    $clientes = $this->Cliente_model->buscar_todos();
    $respuesta = array(
      'success' => 1,
      'data' => $clientes
    );
    echo json_encode($respuesta);
  }
}