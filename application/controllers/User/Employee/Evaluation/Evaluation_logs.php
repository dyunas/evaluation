<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Evaluation_logs extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User/Employee/Dashboard/Dashboard_model');
      $this->load->model('User/Employee/Evaluation/Evaluation_model');
		}

		public function Index()
		{
			if ($this->session->userdata('is_in'))
      {
      	if ($this->session->userdata('user_type') == 1)
      	{
          redirect('/admin/login');
      	}
        elseif ($this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 16)
        {
          redirect('/student/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6)
        {
          redirect('/executive/dashboard');
        }
      	else
      	{
          $data['title'] = 'Evaluation Logs';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['logs'] = $this->Evaluation_model->get_evaluation_logs($data['acc_dtls']['emp_id']);

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Employee/Reports/Index');
        }
      }
      else
      {
      	redirect('/user');
      }
		}

		public function View_logs($id, $date)
		{
			if ($this->session->userdata('is_in'))
      {
      	if ($this->session->userdata('user_type') == 1)
      	{
          redirect('/admin/login');
      	}
        elseif ($this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 16)
        {
          redirect('/student/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6)
        {
          redirect('/executive/dashboard');
        }
      	else
      	{
          $data['title'] = 'Evaluation Logs';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['logs'] = $this->Evaluation_model->get_evaluation_logs_dtls($id, $date, $data['acc_dtls']['emp_id']);
          $data['evlee_id'] = $id;
          $data['date'] = $date;

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Employee/Reports/View_reports');
        }
      }
      else
      {
      	redirect('/user');
      }
		}
	}

// End of file.