<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Evaluation_logs extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
			$this->load->model('Admin/Settings/Evaluation_logs_model');
		}

		public function Index()
		{
			if ($this->session->userdata('is_in'))
			{
				if ($this->session->userdata('user_type') != 1)
				{
					redirect('/user/login');
				}
				else
				{
					$data['title'] = 'Evaluation Logs';
					$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
					$data['eval_logs'] = $this->Evaluation_logs_model->get_evaluation_logs();

					$this->load->view('template/temp_head', $data);
					$this->load->view('Admin/Settings/Evaluation_logs/Index');
				}
			}
			else
			{
				redirect('/admin/login');
			}
		}
	}

// End of file.