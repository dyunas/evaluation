<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Evaluation_logs extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User/Executive/Dashboard/Dashboard_model');
      $this->load->model('User/Executive/Evaluation/Evaluation_model');
		}

		public function Index()
		{
			if ($this->session->userdata('is_in'))
      {
      	if ($this->session->userdata('user_type') == 1)
      	{
          redirect('/admin/login');
      	}
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 16)
        {
          redirect('/student/dashboard');
        }
      	else
      	{
          $data['title'] = 'Evaluation Logs';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['logs'] = $this->Evaluation_model->get_evaluation_logs($data['acc_dtls']['emp_id']);

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Executive/Reports/Index');
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
        elseif ($this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9 OR $this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14)
        {
          redirect('/employee/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 16)
        {
          redirect('/student/dashboard');
        }
      	else
      	{
          $data['title'] = 'Evaluation Logs';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['logs'] = $this->Evaluation_model->get_evaluation_logs_dtls($id, $date, $data['acc_dtls']['emp_id']);
          $data['evlee_id'] = $id;
          $data['date'] = $date;

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Executive/Reports/View_reports');
        }
      }
      else
      {
      	redirect('/user');
      }
		}
	}

// End of file.