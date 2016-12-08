<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Department extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      $this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Settings/Department_model');
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
          $data['title'] = 'Department Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['department'] = $this->Department_model->get_department_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Department/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

    public function New_department()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Department Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Department/New_department');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Insert_department()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Department_model->insert_new_department())
          {
            redirect('admin_panel/settings/department');
          }
          else
          {
            redirect('admin_panel/settings/department/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Edit_department($id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Department Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['edit'] = $this->Department_model->get_department_dtl($id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Department/Edit_department');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Update_department()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Department_model->update_department())
          {
            redirect('/admin_panel/settings/department');
          }
          else
          {
            redirect('/admin_panel/settings/department/edit/'.$this->input->post('id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Delete_department($id)
    {
      if ($this->Department_model->delete_department($id))
      {
        redirect('/admin_panel/settings/department');
      }
      else
      {
        redirect('/admin_panel/settings/department');
      }
    }
  }

// End of file.