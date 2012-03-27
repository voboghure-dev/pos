<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Receive extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Receive';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/receive_list';
    $data['receives'] = $this->MReceive_items->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('item_id')) {
      $item = $this->MItems->get_by_id($this->input->post('item_id'));
      $this->MReceive_items->create($item);
      redirect('receive', 'refresh');
    } else {
      $data['suppliers'] = $this->MSuppliers->get_all_dropdown();
      $data['categories'] = $this->MCategories->get_all();
      $data['items'] = $this->MItems->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/receive_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('id')) {
      $this->MReceive_items->update();
      redirect('receive', 'refresh');
    } else {
      $data['suppliers'] = $this->MSuppliers->get_all_dropdown();
      $data['categories'] = $this->MCategories->get_all();
      $data['items'] = $this->MItems->get_all_dropdown();
      $data['receive'] = $this->MReceive_items->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/receive_edit');
    }
  }

  function delete($id) {
    $this->MReceive_items->delete($id);
    redirect('receive', 'refresh');
  }

}