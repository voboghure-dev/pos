<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Item extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Item';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/item_list';
    $data['items'] = $this->MItems->get_all_with_category();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('name')) {
      $this->MItems->create();
      $this->session->set_flashdata('message', 'Item created');
      redirect('item', 'refresh');
    } else {
      $data['from'] = 'manager';
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/item_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('name')) {
      $this->MItems->update();
      $this->session->set_flashdata('message', 'Item updated.');
      redirect('item', 'refresh');
    } else {
      $data['item'] = $this->MItems->get_by_id($id);
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/item_edit');
    }
  }

  function delete($id) {
    $this->MItems->delete($id);
    redirect('item', 'refresh');
  }

}