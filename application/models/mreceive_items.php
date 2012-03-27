<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MReceive_items extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('receive_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_stock() {
    $data = array();
    $this->db->group_by('edate');
    $q = $this->db->get('receive_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $q = $this->db->get('receive_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = $this->MItems->get_by_id($row['item_id']);
        $row['item_name'] = $item['name'];
        $supplier = $this->MSuppliers->get_by_id($row['supplier_id']);
        $row['supplier_name'] = $supplier['first_name'] . ' ' . $supplier['last_name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create($item) {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'supplier_id' => $this->input->post('supplier_id'),
        'category_id' => $this->input->post('category_id'),
        'item_id' => $this->input->post('item_id'),
        'item_code' => $item['code'],
        'quantity' => $this->input->post('quantity'),
        'unit_price' => $item['purchase_price'],
        'edate' => date('Y-m-d')
    );
    $this->db->insert('receive_items', $data);
    return $this->db->insert_id();
  }

  function update() {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'supplier_id' => $this->input->post('supplier_id'),
        'category_id' => $this->input->post('category_id'),
        'item_id' => $this->input->post('item_id'),
        'quantity' => $this->input->post('quantity'),
        'unit_price' => $this->input->post('unit_price'),
        'edate' => date('Y-m-d')
    );

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('receive_items', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('receive_items');
  }

}
