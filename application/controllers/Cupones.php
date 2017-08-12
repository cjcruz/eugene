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
    $this->load->helper('form');
    $data['tiendas'] = $this->Tienda_model->buscar_todos_para_dropdown();


    $this->load->view('layout/header', $data);
    $this->load->view('cupones/nuevo', $data);
    $this->load->view('layout/footer');
  }
}