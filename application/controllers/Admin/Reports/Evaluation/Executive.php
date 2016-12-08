<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Executive extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Reports/Evaluation/Executive_model');
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
          //$first = mktime(0, 0, 0, date("n"), 1);
          //$last = mktime(23, 59, 0, date("n"), date("t"));
          
          $data['title'] = 'Executive Evaluation Reports';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['reports'] = $this->Executive_model->get_evaluation_report();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Reports/Evaluation/Executive/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

    public function View_report($evlt_id, $evltn_dte)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          $data['title'] = 'Reports for '.$evlt_id;
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['reports'] = $this->Executive_model->get_evaluation_report_dtls($evlt_id, $evltn_dte);
          $data['evlee'] = $this->Executive_model->get_evaluaee($evlt_id);
          $data['date'] = $evltn_dte;

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Reports/Evaluation/Executive/Evaluation_report');
        }
      }
    }
	}

// End of file.