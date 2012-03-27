<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Category extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS - Category';
    $data['menu'] = 'manager';
    $data['content'] = 'admin/category_list';
    $data['categories'] = $this->MCategories->get_all_with_parent();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('name')) {
      $this->MCategories->create();
      $this->session->set_flashdata('message', 'Category created');
      redirect('category', 'refresh');
    } else {
      $this->load->view('admin/category_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('name')) {
      $this->MCategories->update();
      $this->session->set_flashdata('message', 'Category updated.');
      redirect('category', 'refresh');
    } else {
      $data['category'] = $this->MCategories->get_by_id($id);
      $data['categories'] = $this->MCategories->get_top();
      $this->load->vars($data);
      $this->load->view('admin/category_edit');
    }
  }

  function delete($id) {
    $this->MCategories->delete($id);
    redirect('category', 'refresh');
  }

}