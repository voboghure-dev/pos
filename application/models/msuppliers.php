<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSuppliers extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $this->db->where('id', $id);
    $q = $this->db->get('suppliers');
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
    //$this->db->where('company_id', $this->session->userdata('company_id'));
    $this->db->where('id', $id);
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['full_name'];
      }
    }

    $q->free_result();
    return $data;
  }

  function getSupplierNameByPurchaseID($id) {
    //$data = array();
    $this->db->select('suppliers.id, suppliers.full_name');
    $this->db->from('suppliers');
    $this->db->join('purchase_master', 'suppliers.id=purchase_master.supplier_id');
    $this->db->where('purchase_master.id', $id);
    //$this->db->where('company_id', $this->session->userdata('company_id'));
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
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_dropdown() {
    //$this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['first_name'];
      }
    } else {
      $data['0'] = 'No Supplier Added';
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('suppliers', $data);
  }

  function update() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'edate' => date('Y-m-d')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('suppliers', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('suppliers');
  }

}