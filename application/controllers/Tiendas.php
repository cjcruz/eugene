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

  public function nuevo(){
    $data = array();
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/nuevo', $data);
    $this->load->view('layout/footer');
  }

  public function editar(){
    $id = $this->uri->segment(3);
    $data['data'] = $this->Tienda_model->captura($id);
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/editar', $data);
    $this->load->view('layout/footer');
  }

  public function ver(){
    $id = $this->uri->segment(3);
    $data['data'] = $this->Tienda_model->captura($id);
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/ver', $data);
    $this->load->view('layout/footer');
  }


  public function crear(){
    $data = $this->input->post('tiendas');
    $this->Tienda_model->addTienda($data);
    $this->index();
    //var_dump($data);
    //die;
  }

  public function cambiar(){
    $this->Tienda_model->addUpdate();
    $this->index();
  }
  
  public function ranking(){
    $data['title'] = 'Ranking de Tiendas';
    $data['ranking'] = $this->Tienda_model->ranking_de_ventas();

    $this->load->view('layout/header', $data);
    $this->load->view('tiendas/ranking', $data);
    $this->load->view('layout/footer');
  }

}