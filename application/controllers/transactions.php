<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Transactions extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS -> Transaction';
    $data['menu'] = 'transaction';
    $data['content'] = 'admin/transaction';
    $data['transactions'] = $this->MSales_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function delete($id) {
    $this->MSales_details->delete_by_sales_id($id);
    $this->MSales_master->delete($id);
    redirect('transactions', 'refresh');
  }

}