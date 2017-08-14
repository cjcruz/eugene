<?php
require_once APPPATH . '/controllers/Backend_Controller.php';

class Tiendas extends Backend_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Tienda_model');
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'Tiendas';
    $data['establecimientos'] = $this->Tienda_model->buscar_todos();

    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/index', $data);
    $this->load->view('layout/footer');
  }

  public function ranking(){
    $data['title'] = 'Ranking de Tiendas';
    $data['ranking'] = $this->Tienda_model->ranking_de_ventas();

    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/ranking', $data);
    $this->load->view('layout/footer');
  }

}