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
    $q = $this->input->get('q');
    $clientes = $this->Cliente_model->buscar_por_clave($q);
    $respuesta = array(
      'success' => 1,
      'items' => $clientes,
      'total_count' => count($clientes)
    );
    echo json_encode($respuesta);
  }

  public function nuevo(){
    $data = array();
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('clientes/nuevo', $data);
    $this->load->view('layout/footer');
  }

  public function editar(){
    $id = $this->uri->segment(3);
    $data['data'] = $this->Cliente_model->captura($id);
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('Clientes/editar', $data);
    $this->load->view('layout/footer');
  }

  public function ver(){
    $id = $this->uri->segment(3);
    $data['data'] = $this->Cliente_model->captura($id);
    $this->load->helper('form');
    $this->load->view('layout/header', $data);
    $this->load->view('clientes/ver', $data);
    $this->load->view('layout/footer');
  }

  public function crear(){
    $data = $this->input->post('clientes');
    $this->Cliente_model->addCliente($data);
    $this->index();
  }

  public function cambiar(){
    $this->Cliente_model->addUpdate();
    $this->index();
  }

  public function volver(){
    $this->index();
  }
}