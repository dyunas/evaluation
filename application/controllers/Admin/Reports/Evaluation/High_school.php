<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class High_school extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Reports/Evaluation/High_school_model');
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
          $data['title'] = 'High School Evaluation Reports';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['reports'] = $this->High_school_model->get_evaluation_reports();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Reports/Evaluation/High_school/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

    public function View_report($emp_id, $date)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          $data['title'] = 'Reports for '.date('m-d-y', $date);
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['reports'] = $this->High_school_model->get_evaluation_report_dtls($emp_id, $date);
          $data['evlee'] = $this->High_school_model->get_evaluaee($emp_id);
          $data['date'] = $date;

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Reports/Evaluation/High_school/Evaluation_report');
        }
      }
    }
	}

// End of file.