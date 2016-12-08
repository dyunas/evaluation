<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Employee_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_evaluator($evltr_id)
		{
			$this->db->select('*');
			$this->db->from('employee_tbl');
			$this->db->where('emp_id', $evltr_id);

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

		public function get_evaluaee($evlt_id)
		{
			$this->db->select('*');
			$this->db->from('employee_tbl');
			$this->db->where('emp_id', $evlt_id);

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

		public function get_evaluation_report()
		{
			$this->db->distinct();
			$this->db->select('emp_consolidated_poll_tbl.emp_id,  emp_consolidated_poll_tbl.evltn_dte, employee_tbl.fname, employee_tbl.mname, employee_tbl.lname');
			$this->db->from('emp_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = emp_consolidated_poll_tbl.emp_id');

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

		public function get_evaluation_report_dtls($evlt_id, $evltn_dte)
		{
			$this->db->select('*');
			$this->db->from('emp_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = emp_consolidated_poll_tbl.emp_id');
			$this->db->join('emp_questions', 'emp_questions.id = emp_consolidated_poll_tbl.question_id');
			$this->db->where('emp_consolidated_poll_tbl.emp_id', $emp_id);
			$this->db->where('emp_consolidated_poll_tbl.evltn_dte', $evltn_dte);

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