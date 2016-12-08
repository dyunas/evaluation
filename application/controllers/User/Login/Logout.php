<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Logout extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      $this->load->model('User/Login/Login_model');
  	}

  	public function logout()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->Login_model->Logout())
        {
          redirect('/user/login');
        }
        else
        {
          redirect('/user/dashboard');
        }
      }
      else
      {
        redirect('/user');
      }
  	}
  }

// End of file.