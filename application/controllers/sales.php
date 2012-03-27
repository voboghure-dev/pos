<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sales extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS -> Sales';
    $data['menu'] = 'sales';
    $data['content'] = 'admin/sales_entry';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add($id=0, $code=0) {
    if ($this->input->post('item_code')) {
      if (!$this->input->post('sales_id')) {
        $sales_id = $this->MSales_master->create();
      } else {
        $sales_id = $this->input->post('sales_id');
      }
      $item = $this->MItems->get_by_code($this->input->post('item_code'));
      $this->MSales_details->create($sales_id, $item);
      redirect('sales/add/' . $sales_id, 'refresh');
    } else {
      $data['title'] = 'InnovativeBD POS -> Sales';
      $data['menu'] = 'sales';
      if ($code != 0) {
        $data['code'] = $code;
      }
      $data['sales'] = $this->MSales_master->get_by_id($id);
      if (isset($data['sales']['customer_id'])) {
        if ($data['sales']['customer_id'] != 0) {
          $data['customer'] = $this->MCustomers->get_by_id($data['sales']['customer_id']);
        }
      }
      
      $data['details'] = $this->MSales_details->get_by_sales_id($id);
      $data['content'] = 'admin/sales_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function set_customer($sales_id=0, $customer_id=0) {
    if ($customer_id != 0) {
      $this->MSales_master->set_sales_customer($sales_id, $customer_id);
      redirect('sales/add/' . $sales_id, 'refresh');
    } else {
      $data['sales_id'] = $sales_id;
      $data['customers'] = $this->MCustomers->get_all();
      $this->load->vars($data);
      $this->load->view('admin/set_customer');
    }
  }

  function find_item($sales_id=0) {
    $data['sales_id'] = $sales_id;
    $data['items'] = $this->MItems->get_all();
    $this->load->vars($data);
    $this->load->view('admin/find_item');
  }
  
  function new_item(){
    if ($this->input->post('name')) {
      $this->MItems->create();
      redirect($this->input->post('sale_url'), 'refresh');
    } else {
      $data['sale_url'] = $_SERVER['HTTP_REFERER'];
      $data['from'] = 'cashier';
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/item_entry');
    }
  }

  function payout($sales_id) {
    $data['total'] = $this->MSales_details->get_total_price_by_sales_id($sales_id);

    $this->load->vars($data);
    $this->load->view('admin/payout');
  }

  function delete_item($id, $sales_id) {
    $this->MSales_details->delete($id);
    redirect('sales/add/' . $sales_id, 'refresh');
  }

  function delete() {
    $this->MSales_details->delete_by_sales_id($this->input->post('id'));
    $this->MSales_master->delete($this->input->post('id'));
    redirect('sales/add', 'refresh');
  }

}