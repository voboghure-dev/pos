<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'InnovativeBD POS -> Dashboard';
    $data['menu'] = 'dashboard';
    $data['content'] = 'admin/user_list';
    $data['users'] = $this->MUsers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('email')) {
      $this->MUsers->create();
      $this->session->set_flashdata('message', 'User created');
      redirect('user', 'refresh');
    } else {
      $data['title'] = 'InnovativeBD POS -> Dashboard';
      $data['menu'] = 'dashboard';
      $this->load->vars($data);
      $this->load->view('admin/user_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('email')) {
      $this->MUsers->update();
      $this->session->set_flashdata('message', 'User updated');
      redirect('user', 'refresh');
    } else {
      $data['title'] = 'InnovativeBD POS -> Dashboard';
      $data['menu'] = 'dashboard';
      $data['user'] = $this->MUsers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/user_edit');
    }
  }

  function delete($id) {
    $this->MUsers->delete($id);
    redirect('user', 'refresh');
  }

}
