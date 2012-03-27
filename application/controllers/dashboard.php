<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS -> Dashboard';
    $data['menu'] = 'dashboard';
    $data['content'] = 'admin/dashboard_list';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

}