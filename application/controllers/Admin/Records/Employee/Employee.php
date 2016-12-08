<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Employee extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('Admin/Dashboard/Dashboard_model');
  	  $this->load->model('Admin/Records/Employee/Employee_model');
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
          $data['title'] = 'Employee\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['records'] = $this->Employee_model->get_employee_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Employee/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function New_employee()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Employee\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['positions'] = $this->Employee_model->get_positions_tbl();
          $data['department'] = $this->Employee_model->get_department_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Employee/New_employee');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Insert_employee()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->insert_new_employee())
          {
          	redirect('/admin_panel/employee_records');
          }
          else
          {
          	redirect('/admin_panel/employee_records/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Edit_employee($emp_id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Employee\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['edit'] = $this->Employee_model->get_employee_dtls($emp_id);
          $data['positions'] = $this->Employee_model->get_positions_tbl();
          $data['department'] = $this->Employee_model->get_department_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Employee/Edit_employee');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function View_employee($emp_id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Employee\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['info'] = $this->Employee_model->get_employee_dtls($emp_id);
          //$data['supervisions'] = $this->Employee_model->get_supervisions_tbl($data['info']->emp_id);
          $data['other_sup'] = $this->Employee_model->get_other_supervisions_tbl($data['info']->emp_id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Employee/View_employee');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Update_employee()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->update_employee())
          {
          	redirect('/admin_panel/employee_records/'.$this->input->post('emp_id'));
          }
          else
          {
          	redirect('/admin_panel/employee_records/edit/'.$this->input->post('emp_id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

    // public function Add_supervisions($emp_id)
    // {
    //   if ($this->session->userdata('is_in'))
    //   {
    //     if ($this->session->userdata('user_type') != 1)
    //     {
    //       redirect('/user/login');
    //     }

    //     else
    //     {
    //       $data['title'] = 'Employee\'s Record';
    //       $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
    //       $data['info'] = $this->Employee_model->get_employee_dtls($emp_id);
    //       $data['courses'] = $this->Employee_model->get_course_tbl();
    //       if ($data['info']->user_type == 13):
    //         $data['subjects'] = $this->Employee_model->get_hs_subjects_tbl();
    //       else:
    //         $data['subjects'] = $this->Employee_model->get_col_subjects_tbl();
    //       endif;

    //       $this->load->view('template/temp_head', $data);
    //       $this->load->view('Admin/Records/Employee/Add_supervisions');
    //     }
    //   }
    //   else
    //   {
    //     redirect('/admmin');
    //   }
    // }

    // public function Insert_supervisions($emp_id)
    // {
    //   if ($this->session->userdata('is_in'))
    //   {
    //     if ($this->session->userdata('user_type') != 1)
    //     {
    //       redirect('/user/login');
    //     }

    //     else
    //     {
    //       if ($this->Employee_model->insert_supervisions($emp_id))
    //       {
    //         redirect('/admin_panel/employee_records/'.$emp_id);
    //       }
    //       else
    //       {
    //         redirect('/admin_panel/employee_records/add_sup/'.$emp_id);
    //       }
    //     }
    //   }
    //   else
    //   {
    //     redirect('/admin');
    //   }
    // }

    public function Add_other_supervisions($emp_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Employee\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          //$data['info'] = $this->Employee_model->get_employee_dtls($emp_id);
          $data['employees'] = $this->Employee_model->get_employee_tbl($emp_id);
          $data['evltr'] = $emp_id;

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Employee/Add_other_supervisions');
        }
      }
      else
      {
        redirect('/admmin');
      }
    }

    public function Insert_other_supervisions($emp_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->insert_other_supervisions($emp_id))
          {
            redirect('/admin_panel/employee_records/'.$emp_id);
          }
          else
          {
            redirect('/admin_panel/employee_records/add_other_sup/'.$emp_id);
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

  	public function Delete_employee($emp_id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->delete_employee($emp_id))
          {
          	redirect('/admin_panel/employee_records');
          }
          else
          {
          	redirect('/admin_panel/employee_records');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

    public function Delete_supervisions($emp_id, $row_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->delete_supervisions($emp_id, $row_id))
          {
            redirect('/admin_panel/employee_records/'.$emp_id);
          }
          else
          {
            redirect('/admin_panel/employee_records/'.$emp_id);
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Delete_other_supervisions($evltr, $emp_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Employee_model->delete_other_supervisions($evltr, $emp_id))
          {
            redirect('/admin_panel/employee_records/'.$evltr);
          }
          else
          {
            redirect('/admin_panel/employee_records/'.$evltr);
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