<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('User/Login/Login_model');
  	}

  	public function index()
  	{
  	  $this->login();
  	}

  	public function login()
  	{
  	  if ($this->session->userdata('is_in'))
  	  {
  	  	if ($this->session->userdata('user_type') == 16 OR $this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 20)
        {
          redirect('/student/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9 OR $this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          redirect('/executive/dashboard');
        }
  	  }
  	  else
  	  {
  	  	$data['title'] = 'Login Page';

  	  	$this->load->view('template/temp_head', $data);
  	  	$this->load->view('User/Login/Login');
  	  }
  	}

  	public function auth_login()
  	{
  	  if ($this->Login_model->check_login_credentials())
  	  {
  	  	if ($this->session->userdata('user_type') == 16 OR $this->session->userdata('user_type') == 15 OR $this->session->userdata('user_type') == 20)
        {
          redirect('/student/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9 OR $this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          redirect('/executive/dashboard');
        }
  	  }
  	  else
  	  {
  	    $data['title'] = 'Login Page';

  	  	$this->load->view('template/temp_head', $data);
  	  	$this->load->view('User/Login/Login');
  	  }
  	}

    public function Reset_pword()
    {
      if ($this->Login_model->reset_pword())
      {
        redirect('/user/login');
      }
      else
      {
        redirect('/user/login');
      }
    }
  }

 // End of file.