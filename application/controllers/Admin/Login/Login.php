<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('Admin/Login/Login_model');
  	}

  	public function index()
  	{
  	  $this->login();
  	}

  	public function login()
  	{
  	  if ($this->session->userdata('is_in'))
  	  {
  	  	redirect('/admin_panel/dashboard');
  	  }
  	  else
  	  {
  	  	$data['title'] = 'Login Page';

  	  	$this->load->view('template/temp_head', $data);
  	  	$this->load->view('Admin/Login/Login');
  	  }
  	}

  	public function auth_login()
  	{
  	  if ($this->Login_model->check_login_credentials())
  	  {
  	  	redirect('/admin_panel/dashboard');
  	  }
  	  else
  	  {
  	    $data['title'] = 'Login Page';

  	  	$this->load->view('template/temp_head', $data);
  	  	$this->load->view('Admin/Login/Login');
  	  }
  	}
  }

 // End of file.