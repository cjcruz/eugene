<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    $this->load->helper('url_helper');
  }

  public function index(){
    // if( !$this->require_role('admin') ) return;

    $data['title'] = 'Dashboard';
    $this->load->view('layout/header', $data);
    $this->load->view('welcome_message', $data);
    $this->load->view('layout/footer', $data);
  }
}
