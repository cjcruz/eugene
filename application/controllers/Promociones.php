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

}