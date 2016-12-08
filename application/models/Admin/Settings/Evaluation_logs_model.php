<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Evaluation_logs_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_evaluation_logs()
		{
			$this->db->select('*');
			$this->db->from('eval_session');

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