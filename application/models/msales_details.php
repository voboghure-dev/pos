<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSales_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('sales_details');
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
    $q = $this->db->get('sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_sales_id($id=0) {
    $data = array();
    $this->db->where('sales_id', $id);
    $q = $this->db->get('sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = $this->MItems->get_by_code($row['item_code']);
        $row['item_name'] = $item['name'];
        $row['item_price'] = $item['sale_price'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_total_price_by_sales_id($id=0) {
    //$data = array();
    $this->db->select_sum('total_price');
    $this->db->where('sales_id', $id);
    $q = $this->db->get('sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['total_price'];
      }
    }

    $q->free_result();
    return $data;
  }

  function get_total_qty_by_sales_id($id=0) {
    //$data = array();
    $this->db->select_sum('quantity');
    $this->db->where('sales_id', $id);
    $q = $this->db->get('sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['quantity'];
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_item_between_date() {
    $data = array();
    if($this->input->post('item')!='all'){
      $this->db->where('item_code', $this->input->post('item'));
    }
    $this->db->where('edate >=', $this->input->post('sdate'));
    $this->db->where('edate <=', $this->input->post('edate'));
    $this->db->order_by('id', 'DESC');
    $q = $this->db->get('sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = $this->MItems->get_by_code($row['item_code']);
        $row['item_name'] = $item['name'];
        $user = $this->MUsers->get_by_id($row['user_id']);
        $row['user_name'] = $user['full_name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create($sales_id, $item) {
    $data = array(
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'item_id' => $item['id'],
        'item_code' => $this->input->post('item_code'),
        'sales_id' => $sales_id,
        'quantity' => $this->input->post('quantity'),
        'unit_price' => $item['sale_price'],
        'total_price' => $this->input->post('quantity')*$item['sale_price'],
        'edate' => date('Y-m-d')
    );
    $this->db->insert('sales_details', $data);

    return $this->db->insert_id();
  }

  function delete_by_sales_id($sales_id) {
    $this->db->where('sales_id', $sales_id);
    $this->db->delete('sales_details');
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('sales_details');
  }

}