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
  	  if ($this->session->userdata('user_type') == 16)
  	  {
  	  	$this->db->select('*');
  	  	$this->db->from('hs_student_tbl');
  	  	$this->db->where('id', $this->session->userdata('id'));

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
  	  elseif ($this->session->userdata('user_type') == 15)
  	  {
  	  	$this->db->select('*');
  	  	$this->db->from('col_student_tbl');
        $this->db->join('course_tbl', 'course_tbl.course_code = col_student_tbl.course');
  	  	$this->db->where('col_student_tbl.id', $this->session->userdata('id'));

  	  	$query2 = $this->db->get();

  	  	if ($query2->num_rows() > 0)
  	  	{
  	  	  return $query2->row_array();
  	  	}
  	  	else
  	  	{
  	  	  return FALSE;
  	  	}
  	  }
      else
      {
        $this->db->select('*');
        $this->db->from('elem_student_tbl');
        $this->db->where('elem_student_tbl.id', $this->session->userdata('id'));

        $query2 = $this->db->get();

        if ($query2->num_rows() > 0)
        {
          return $query2->row_array();
        }
        else
        {
          return FALSE;
        }
      }
  	}
  }

// End of file.