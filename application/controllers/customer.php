<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Customer extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Customer';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/customer_list';
    $data['customers'] = $this->MCustomers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('first_name')) {
      $this->MCustomers->create();
      $this->session->set_flashdata('message', 'Customer created');
      redirect('customer', 'refresh');
    } else {
      $this->load->view('admin/customer_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('first_name')) {
      $this->MCustomers->update();
      $this->session->set_flashdata('message', 'Customer updated.');
      redirect('customer', 'refresh');
    } else {
      $data['customer'] = $this->MCustomers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/customer_edit');
    }
  }

  function delete($id) {
    $this->MCustomers->delete($id);
    redirect('customer', 'refresh');
  }

}