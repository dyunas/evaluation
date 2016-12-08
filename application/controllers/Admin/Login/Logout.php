<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Logout extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      $this->load->model('Admin/Login/Login_model');
  	}

  	public function logout()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->Login_model->logout())
        {
          redirect('/admin/login');
        }
        else
        {
          redirect('/admin_panel/dashboard');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}
  }

// End of file.