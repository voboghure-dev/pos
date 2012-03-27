<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MCategories extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $this->db->where('id', $id);
    $q = $this->db->get('categories');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_with_parent() {
    $data = array();
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('categories');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $parent = array();
        if ($row['parent_id'] > 0) {
          $this->db->where('id', $row['parent_id']);
          $p = $this->db->get('categories');
          foreach ($p->result_array() as $newrow) {
            $parent = $newrow;
          }
        } else {
          $parent['name'] = 'Root';
        }
        $row['parentname'] = $parent['name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $q = $this->db->get('categories');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['name'];
      }
    }

    $q->free_result();
    return $data;
  }

  function get_top() {
    $data[0] = "root";
    $this->db->where('company_id', $this->session->userdata('company_id'));
    $this->db->where('parent_id', 0);
    $q = $this->db->get('categories');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['name'];
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'name' => $this->input->post('name'),
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'parent_id' => $this->input->post('parent_id'),
        'code' => $this->input->post('code'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('categories', $data);
  }

  function update() {
    $data = array(
        'name' => $this->input->post('name'),
        'company_id' => $this->session->userdata('company_id'),
        'user_id' => $this->session->userdata('user_id'),
        'parent_id' => $this->input->post('parent_id'),
        'code' => $this->input->post('code'),
        'edate' => date('Y-m-d')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('categories', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('categories');
  }

}