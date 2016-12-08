<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('User/Student/Dashboard/Dashboard_model');
  	}

  	public function Index()
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
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6 OR $this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9)
        {
          redirect('/executive/dashboard');
        }
        else
        {
          $data['title'] = 'Dashboard';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Student/Dashboard/Index');
        }
      }
      else
      {
        redirect('/user');
      }
  	}
  }

// End of file.