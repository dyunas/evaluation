<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Employee extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('Admin/Dashboard/Dashboard_model');
  	  $this->load->model('Admin/Questionnaires/Employee_model');
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
          $data['title'] = 'Employee\'s Questionnaire';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['questions'] = $this->Employee_model->get_questionnaires();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Questionnaires/Employee/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function New_question()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->check_eval_status())
          {
            redirect('/admin_panel/questionnaire/employee');
          }
          else
          {
            $data['title'] = 'New Question';
            $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

            $this->load->view('template/temp_head', $data);
            $this->load->view('Admin/Questionnaires/Employee/New_question');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Insert_question()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if($this->Employee_model->insert_new_question())
          {
            redirect('/admin_panel/questionnaire/employee');
          }
          else
          {
            redirect('/admin_panel/questionnaire/employee/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Edit_question($id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Employee_model->check_eval_status())
          {
            redirect('/admin_panel/questionnaire/employee');
          }
          else
          {
            $data['title'] = 'Edit Question';
            $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
            $data['edit'] = $this->Employee_model->get_question_dtls($id);

            $this->load->view('template/temp_head', $data);
            $this->load->view('Admin/Questionnaires/Employee/Edit_question');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Update_question()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Employee_model->update_question())
          {
            redirect('/admin_panel/questionnaire/employee');
          }
          else
          {
            redirect('/admin_panel/questionnaire/employee/edit/'.$this->input->post('id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Delete_question($id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Employee_model->check_eval_status())
          {
            redirect('/admin_panel/questionnaire/employee');
          }
          else
          {
            if ($this->Employee_model->delete_question($id))
            {
              redirect('/admin_panel/questionnaire/employee');
            }
            else
            {
              redirect('/admin_panel/questionnaire/employee');
            }
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }
  }

// End of file.