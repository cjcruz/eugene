<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/controllers/Backend_Controller.php';

class Welcome extends Backend_Controller {

  public function __construct(){
    parent::__construct();    
  }

  public function index(){
    $data['title'] = 'Dashboard';
    
    $this->load->view('layout/header', $data);
    $this->load->view('welcome_message', $data);
    $this->load->view('layout/footer', $data);
  }
}
