<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Evaluation extends CI_Controller
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
          $row = $this->Evaluation_model->check_evaluation_status();
          if ($row)
          {
          	$data['title'] = 'Evaluation Module';
          	$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          	$data['records'] = $this->Evaluation_model->get_avlbl_employee($data['acc_dtls']['emp_id'], $row->date);

          	$this->load->view('template/temp_head', $data);
          	$this->load->view('User/Employee/Evaluation/Index');
          }
          else
          {
          	redirect('/employee/dashboard');
          }
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
          $row = $this->Evaluation_model->check_evaluation_status();
          $data['evltn_date'] = $row->date;
      		$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
      		$val = $this->Evaluation_model->check_evaluation_tag($id, $data['acc_dtls']['emp_id'], $row->date);

      		if($val)
      		{
      			$data['title'] = 'Evaluation Form';
      			$data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
      			$data['questions'] = $this->Evaluation_model->get_emp_questionnaire();
            $data['emp_id'] = $id;

      			$this->load->view('template/temp_head', $data);
      			$this->load->view('User/Employee/Evaluation/Evaluation_form');

      		}
      		else
      		{
      			redirect('/employee/evaluate/');
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
          $row = $this->Evaluation_model->check_evaluation_status();
          $data['evltn_date'] = $row->date;
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $val = $this->Evaluation_model->check_evaluation_tag($id, $data['acc_dtls']['emp_id'], $row->date);

          if ($row)
          {
            if($val)
            {
              $data['title'] = 'Evaluation Form';
              $data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
              $data['questions'] = $this->Evaluation_model->get_stud_questionnaire();
              $data['emp_id'] = $id;

              $this->load->view('template/temp_head', $data);
              $this->load->view('User/Employee/Evaluation/Preview_evaluation');

            }
            else
            {
              redirect('/employee/evaluate/');
            }
          }
          else
          {
            redirect('/employee/dashboard');
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
          if ($this->Evaluation_model->insert_emp_evaluation())
          {
            redirect('/employee/evaluate');
          }
          else
          {
            redirect('/employee/evaluate/'.$this->input->post('emp_id'));
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