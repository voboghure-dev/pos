<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Supplier extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Supplier';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/supplier_list';
    $data['suppliers'] = $this->MSuppliers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('first_name')) {
      $this->MSuppliers->create();
      $this->session->set_flashdata('message', 'Supplier created');
      redirect('supplier', 'refresh');
    } else {
      $this->load->view('admin/supplier_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('first_name')) {
      $this->MSuppliers->update();
      $this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/supplier_edit');
    }
  }

  function delete($id) {
    $this->MSuppliers->delete($id);
    redirect('supplier', 'refresh');
  }

}