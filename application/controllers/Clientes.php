<?php
class Clientes extends MY_Controller {

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

  public function view($slug = NULL){
    $data['news_item'] = $this->news_model->get_news($slug);
  }
}