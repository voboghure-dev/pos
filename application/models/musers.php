<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MUsers extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function verify($email, $pw) {
    $this->db->where('email', $email);
    $this->db->where('password', $pw);
    $this->db->where('status', 'active');
    $this->db->limit(1);
    $q = $this->db->get('users');
    if ($q->num_rows() > 0) {
      $row = $q->row_array();
      $data['user_id'] = $row['id'];
      $data['company_id'] = $row['company_id'];
      $data['full_name'] = $row['full_name'];
      $this->session->set_userdata($data);
    } else {
      $this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
    }
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $this->db->limit(1);
    $q = $this->db->get('users');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_email($email) {
    $data = array();
    $this->db->select('id, email, status, password');
    $this->db->where('email', $email);
    $this->db->limit(1);
    $q = $this->db->get('users');
    if ($q->num_rows() > 0) {
      $data = $q->row_array();
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    //$this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('users');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'email' => $this->input->post('email'),
        'password' => substr(do_hash($this->input->post('password')), 0, 16),
        'full_name' => $this->input->post('full_name'),
        'type' => $this->input->post('type'),
        'status' => $this->input->post('status'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('users', $data);
  }

  function update() {
    if ($this->input->post('password')) {
      $data = array(
          'user_id' => $this->session->userdata('user_id'),
          'email' => $this->input->post('email'),
          'password' => substr(do_hash($this->input->post('password')), 0, 16),
          'full_name' => $this->input->post('full_name'),
          'type' => $this->input->post('type'),
          'status' => $this->input->post('status'),
          'edate' => date('Y-m-d')
      );
    } else {
      $data = array(
          'user_id' => $this->session->userdata('user_id'),
          'email' => $this->input->post('email'),
          'full_name' => $this->input->post('full_name'),
          'type' => $this->input->post('type'),
          'status' => $this->input->post('status'),
          'edate' => date('Y-m-d')
      );
    }

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('users', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('users');
  }

}