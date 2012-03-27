<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Manager extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Manager';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/manager';
    //$data['sales'] = $this->MSales_master->get_sales_customer();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('customer_id')) {
      $sales_id = $this->MSales_master->create();
      redirect('sales/add_item/' . $sales_id, 'refresh');
    } else {
      $data['title'] = 'My POS -> Sales -> Entry.';
      $data['menu'] = 'sales';
      $data['customers'] = $this->MCustomers->get_all_dropdown();
      $data['content'] = 'admin/sales_master';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_item($sales_id) {
    if ($this->input->post('sales_id')) {
      $this->MSales_details->create($sales_id);
      redirect('sales/add_item/' . $sales_id, 'refresh');
    } else {
      $data['title'] = 'My POS -> Sales -> Add Item.';
      $data['menu'] = 'sales';
      $sales_master = $this->MSales_master->get_by_id($sales_id);
      $data['customer'] = $this->MCustomers->get_by_id($sales_master['customer_id']);
      $data['sales_id'] = $sales_id;
      $data['sales_items'] = $this->MSales_details->get_by_sales_id($sales_id);
      $data['items'] = $this->MItems->get_all_dropdown();
      $data['content'] = 'admin/sales_details';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit($id=0) {
    if($this->input->post('sales_id')){
      $this->MSales_master->update();
      redirect('sales/add_item/' . $this->input->post('sales_id'), 'refresh');
    }else{
      $data['title'] = 'My POS -> Sales -> Edit.';
      $data['menu'] = 'sales';
      $data['sales'] = $this->MSales_master->get_by_id($id);
      $data['customers'] = $this->MCustomers->get_all_dropdown();
      $data['content'] = 'admin/sales_master_edit';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }

  }

  function delete_item() {
    $this->MSales_details->delete($this->input->post('id'));
    echo "<h1>Sales item deleted.</h1>";
  }

  function delete() {
    $this->MSales_details->delete_by_sales_id($this->input->post('id'));
    $this->MSales_master->delete($this->input->post('id'));
    echo "<h1>Sales deleted.</h1>";
  }

}