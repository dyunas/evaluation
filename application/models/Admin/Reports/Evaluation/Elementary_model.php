<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Elementary_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_evaluaee($emp_id)
		{
			$this->db->select('*');
			$this->db->from('employee_tbl');
			$this->db->where('emp_id', $emp_id);

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}

		public function get_evaluation_reports()
		{
			$this->db->distinct();
			$this->db->select('stud_elem_consolidated_poll_tbl.emp_id,  stud_elem_consolidated_poll_tbl.evltn_dte, employee_tbl.fname, employee_tbl.mname, employee_tbl.lname');
			$this->db->from('stud_elem_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = stud_elem_consolidated_poll_tbl.emp_id');

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return FALSE;
			}
		}

		public function get_evaluation_report_dtls($emp_id, $date)
		{
			$this->db->select('*');
			$this->db->from('stud_elem_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = stud_elem_consolidated_poll_tbl.emp_id');
			$this->db->join('stud_questions', 'stud_questions.id = stud_elem_consolidated_poll_tbl.question_id');
			$this->db->where('stud_elem_consolidated_poll_tbl.emp_id', $emp_id);
			$this->db->where('stud_elem_consolidated_poll_tbl.evltn_dte', $date);

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return FALSE;
			}
		}
	}

// End of file.