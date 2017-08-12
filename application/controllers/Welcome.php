<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url_helper');
  }

  public function index(){
    $data['title'] = 'Dashboard';
    $this->load->view('layout/header', $data);
    $this->load->view('welcome_message', $data);
    $this->load->view('layout/footer', $data);
  }
}
