<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard_model extends CI_Model
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	}

  	public function get_acct_details()
  	{
  	  $this->db->select('*');
      $this->db->from('employee_tbl');
      $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
      $this->db->where('employee_tbl.id', $this->session->userdata('id'));

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row_array();
      }
      else
      {
        return FALSE;
      }
  	}
  }

// End of file.