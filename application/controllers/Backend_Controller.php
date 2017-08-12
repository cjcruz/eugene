<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_Controller extends MY_Controller{

  public function __construct(){
    parent::__construct();
    $this->is_logged_in();
    if( !$this->require_role('admin','manager') ) return;
    $this->load->helper('url_helper');
  }
  
}