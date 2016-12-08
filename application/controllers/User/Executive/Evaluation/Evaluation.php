<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Evaluation extends CI_Controller
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
          $data['title'] = 'Evaluation Module';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          //$data['sups'] = $this->Evaluation_model->get_other_supervisions($data['acc_dtls']['emp_id']);
          if ($this->session->userdata('user_type') == 2):
            $data['records'] = $this->Evaluation_model->get_avl_employee($data['acc_dtls']['emp_id']);
          else:
            $data['records'] = $this->Evaluation_model->get_avl_employee($data['acc_dtls']['emp_id']);
          endif;

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Executive/Evaluation/Index');
        }
      }
      else
      {
      	redirect('/user');
      }
  	}

  	public function Evaluation_form($id)
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
      		$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
      		$val = $this->Evaluation_model->check_evaluation_tag($id, $data['acc_dtls']['emp_id']);

      		if($val)
      		{
      			$data['title'] = 'Evaluation Form';
      			$data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
      			$data['questions'] = $this->Evaluation_model->get_exec_questionnaire();

      			$this->load->view('template/temp_head', $data);
      			$this->load->view('User/Executive/Evaluation/Evaluation_form');

      		}
      		else
      		{
      			redirect('/executive/evaluate/');
      		}
      	}
      }
      else
      {
      	redirect('/user');
      }
  	}

    public function Preview_evaluation($id)
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
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $val = $this->Evaluation_model->check_evaluation_tag($id, $data['acc_dtls']['emp_id']);

          if ($row)
          {
            if($val)
            {
              $data['title'] = 'Evaluation Form';
              $data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
              $data['questions'] = $this->Evaluation_model->get_exec_questionnaire();
              $data['emp_id'] = $id;

              $this->load->view('template/temp_head', $data);
              $this->load->view('User/Executive/Evaluation/Preview_evaluation');

            }
            else
            {
              redirect('/executive/evaluate/');
            }
          }
          else
          {
            redirect('/executive/dashboard');
          }
        }
      }
      else
      {
        redirect('/user');
      }
    }

  	public function Insert_evaluation()
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
          if ($this->Evaluation_model->insert_exec_evaluation())
          {
            redirect('/executive/evaluate');
          }
          else
          {
            redirect('/executive/evaluate/'.$this->input->post('emp_id'));
          }
  	  	}
  	  }
  	  else
  	  {
  	  	redirect('/user');
  	  }
  	}
  }

// End of file.