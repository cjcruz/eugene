<?php
require_once APPPATH . '/controllers/Backend_Controller.php';

class Parqueoc extends Backend_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Parqueoc_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'CONTROL DE PARQUEO';
    $data['establecimientos'] = $this->Parqueoc_model->buscar_todos();
    $this->load->view('layout/header', $data);
    $this->load->view('parqueoc/index', $data);
    $this->load->view('layout/footer');
  }

  public function ver(){
    
  }
  
}