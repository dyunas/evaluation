<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Evaluation extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User/Student/Dashboard/Dashboard_model');
      $this->load->model('User/Student/Evaluation/Evaluation_model');
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
          $row = $this->Evaluation_model->check_evaluation_status();
          if ($row)
          {
          	$data['title'] = 'Evaluation Module';
          	$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          	if ($this->session->userdata('user_type') == 15):
          		$data['records'] = $this->Evaluation_model->get_avlbl_instructor($data['acc_dtls']['stud_id'], $row->date);
          	elseif ($this->session->userdata('user_type') == 16 OR $this->session->userdata('user_type') == 20):
          		$data['records'] = $this->Evaluation_model->get_avlbl_teacher($data['acc_dtls']['stud_id'], $row->date);
          	endif;

          	$this->load->view('template/temp_head', $data);
          	$this->load->view('User/Student/Evaluation/Index');
          }
          else
          {
          	redirect('/student/dashboard');
          }
      	}
      }
      else
      {
      	redirect('/user');
      }
  	}

  	public function Evaluation_form($id, $subject)
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
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6 OR $this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9)
        {
          redirect('/executive/dashboard');
        }
      	else
      	{
          $row = $this->Evaluation_model->check_evaluation_status();
          $data['evltn_date'] = $row->date;
      		$data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
      		$val = $this->Evaluation_model->check_evaluation_tag($id, $subject, $data['acc_dtls']['stud_id'], $row->date);

        	if ($row)
          {
            if($val)
            {
              $data['title'] = 'Evaluation Form';
              $data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
              $data['questions'] = $this->Evaluation_model->get_stud_questionnaire();
              $data['subject'] = $subject;
              $data['emp_id'] = $id;

              $this->load->view('template/temp_head', $data);
              $this->load->view('User/Student/Evaluation/Evaluation_form');

            }
            else
            {
              redirect('/student/evaluate/');
            }
          }
          else
          {
            redirect('/student/dashboard');
          }
      	}
      }
      else
      {
      	redirect('/user');
      }
  	}

    public function Preview_evaluation($id, $subject)
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
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6 OR $this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9)
        {
          redirect('/executive/dashboard');
        }
        else
        {
          $row = $this->Evaluation_model->check_evaluation_status();
          $data['evltn_date'] = $row->date;
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $val = $this->Evaluation_model->check_evaluation_tag($id, $subject, $data['acc_dtls']['stud_id'], $row->date);

          if ($row)
          {
            if($val)
            {
              $data['title'] = 'Evaluation Form';
              $data['emp_info'] = $this->Evaluation_model->get_employee_dtls($id);
              $data['questions'] = $this->Evaluation_model->get_stud_questionnaire();
              $data['subject'] = $subject;
              $data['emp_id'] = $id;

              $this->load->view('template/temp_head', $data);
              $this->load->view('User/Student/Evaluation/Preview_evaluation');

            }
            else
            {
              redirect('/student/evaluate/');
            }
          }
          else
          {
            redirect('/student/dashboard');
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
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        elseif ($this->session->userdata('user_type') == 2 OR $this->session->userdata('user_type') == 3 OR $this->session->userdata('user_type') == 4 OR $this->session->userdata('user_type') == 5 OR $this->session->userdata('user_type') == 6 OR $this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9)
        {
          redirect('/executive/dashboard');
        }
  	  	else
  	  	{
          if ($this->Evaluation_model->insert_stud_evaluation())
          {
            redirect('/student/evaluate');
          }
          else
          {
            redirect('/student/evaluate/'.$this->input->post('emp_id'));
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