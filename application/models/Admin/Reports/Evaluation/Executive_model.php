<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Executive_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_mthly_date_report()
		{
			$this->db->distinct();
			$this->db->select('evltn_dte');
			$this->db->from('exec_consolidated_poll_tbl');

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

		public function get_evaluation_report()
		{
			$this->db->distinct();
			$this->db->select('exec_consolidated_poll_tbl.emp_id,  exec_consolidated_poll_tbl.evltn_dte, employee_tbl.fname, employee_tbl.mname, employee_tbl.lname');
			$this->db->from('exec_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = exec_consolidated_poll_tbl.emp_id');

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

		public function get_evaluation_report_dtls($evlt_id, $evltn_dte)
		{
			$this->db->select('*');
			$this->db->from('exec_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = exec_consolidated_poll_tbl.emp_id');
			$this->db->join('exec_questions', 'exec_questions.id = exec_consolidated_poll_tbl.question_id');
			$this->db->where('exec_consolidated_poll_tbl.emp_id', $emp_id);
			$this->db->where('exec_consolidated_poll_tbl.evltn_dte', $evltn_dte);

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