<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Reports extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Report';
    $data['menu'] = 'reports';
    $data['content'] = 'admin/reports/main';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function sales_by_date() {
    if ($this->input->post('sdate')) {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_date_details';
      $data['sales'] = $this->MSales_master->get_all_between_date();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    } else {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_date';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function sales_by_item() {
    if ($this->input->post('sdate')) {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_item_details';
      $data['sales'] = $this->MSales_details->get_by_item_between_date();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    } else {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_item';
      $data['items'] = $this->MItems->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function sales_by_customer() {
    if ($this->input->post('sdate')) {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_customer_details';
      $data['sales'] = $this->MSales_master->get_by_customer_between_date();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    } else {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_customer';
      $data['customers'] = $this->MCustomers->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function transaction_all() {
    $data['title'] = 'InnovativeBD POS -> Report';
    $data['menu'] = 'reports';
    $data['content'] = 'admin/reports/transaction_all';
    $data['transactions'] = $this->MSales_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function inventory_by_item() {
    if ($this->input->post('sdate')) {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/sales_by_customer_details';
      $data['inventory'] = $this->MSales_master->get_by_customer_between_date();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    } else {
      $data['title'] = 'InnovativeBD POS - Report';
      $data['menu'] = 'reports';
      $data['content'] = 'admin/reports/inventory_by_item';
      $data['items'] = $this->MItems->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function check() {
    $receive = $this->MReceive_items->get_stock();
    $sale = $this->MSales_details->get_stock();
    $result = array_merge($receive, $sale);
    $sortarr = array_distinct($result, 'edate');

    print_r($sortarr);
    //print_r($result);
  }

}