<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MCustomers extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_name($id) {
    //$data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['full_name'];
      }
    }

    $q->free_result();
    return $data;
  }

  function getCustomerNameBySalesID($id) {
    //$data = array();
    $this->db->select('customers.id, customers.full_name');
    $this->db->from('customers');
    $this->db->join('sales_master', 'customers.id=sales_master.customer_id');
    $this->db->where('sales_master.id', $id);
    $q = $this->db->get();
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_dropdown() {
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['full_name'];
      }
    } else {
      $data['0'] = 'No Customer Added';
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'title' => $this->input->post('title'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'address1' => $this->input->post('address1'),
        'address2' => $this->input->post('address2'),
        'city' => $this->input->post('city'),
        'zip' => $this->input->post('zip'),
        'country' => $this->input->post('country'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'notes' => $this->input->post('notes'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('customers', $data);
  }

  function update() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'title' => $this->input->post('title'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'address1' => $this->input->post('address1'),
        'address2' => $this->input->post('address2'),
        'city' => $this->input->post('city'),
        'zip' => $this->input->post('zip'),
        'country' => $this->input->post('country'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'notes' => $this->input->post('notes'),
        'edate' => date('Y-m-d')
    );
    
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('customers', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('customers');
  }

}