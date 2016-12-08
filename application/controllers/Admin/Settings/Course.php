<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Course extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('Admin/Dashboard/Dashboard_model');
  	  $this->load->model('Admin/Settings/Course_model');
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
          $data['title'] = 'Course Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['courses'] = $this->Course_model->get_courses_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Course/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function New_course()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Course Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Course/New_course');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Insert_course()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Course_model->insert_new_course())
          {
          	redirect('/admin_panel/settings/course');
          }
          else
          {
          	redirect('admin_panel/settings/course/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Edit_course($id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Course Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['edit'] = $this->Course_model->get_course_dtls($id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Course/Edit_course');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Update_course()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Course_model->update_course())
          {
          	redirect('/admin_panel/settings/course');
          }
          else
          {
          	redirect('/admin_panel/settings/course/edit/'.$this->input->post('id'));
          }
        }
      }
  	}

  	public function Delete_course($id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Course_model->delete_course($id))
          {
            redirect('/admin_panel/settings/course');
          }
          else
          {
            redirect('/admin_panel/settings/course');
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