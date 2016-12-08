<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class High_school_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_evaluator($evltr_id)
		{
			$this->db->select('*');
			$this->db->from('col_student_tbl');
			$this->db->where('stud_id', $evltr_id);

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				$this->db->select('*');
				$this->db->from('hs_student_tbl');
				$this->db->where('stud_id', $evltr_id);

				$query2 = $this->db->get();

				if ($query2->num_rows() > 0)
				{
					return $query->row();
				}
				else
				{
					return FALSE;
				}
			}
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
			$this->db->select('stud_hs_consolidated_poll_tbl.emp_id,  stud_hs_consolidated_poll_tbl.evltn_dte, employee_tbl.fname, employee_tbl.mname, employee_tbl.lname');
			$this->db->from('stud_hs_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = stud_hs_consolidated_poll_tbl.emp_id');

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
			$this->db->from('stud_hs_consolidated_poll_tbl');
			$this->db->join('employee_tbl','employee_tbl.emp_id = stud_hs_consolidated_poll_tbl.emp_id');
			$this->db->join('stud_questions', 'stud_questions.id = stud_hs_consolidated_poll_tbl.question_id');
			$this->db->where('stud_hs_consolidated_poll_tbl.emp_id', $emp_id);
			$this->db->where('stud_hs_consolidated_poll_tbl.evltn_dte', $date);

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