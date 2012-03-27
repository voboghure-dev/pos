<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sales_return extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'MyPOS -> Return -> Home';
    $data['menu'] = 'sales_return';
    $data['content'] = 'admin/sales_return_list';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

}