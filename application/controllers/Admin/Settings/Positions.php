<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Positions extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      $this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Settings/Positions_model');
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
          $data['title'] = 'Positions Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['positions'] = $this->Positions_model->get_positions_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Positions/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

    public function New_position()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Positions Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Positions/New_position');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Insert_position()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Positions_model->insert_new_position())
          {
            redirect('admin_panel/settings/positions');
          }
          else
          {
            redirect('admin_panel/settings/positions/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Edit_position($id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Positions Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['edit'] = $this->Positions_model->get_position_dtl($id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Positions/Edit_position');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Update_position()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Positions_model->update_position())
          {
            redirect('/admin_panel/settings/positions');
          }
          else
          {
            redirect('/admin_panel/settings/positions/edit/'.$this->input->post('id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Delete_position($id)
    {
      if ($this->Positions_model->delete_position($id))
      {
        redirect('/admin_panel/settings/positions');
      }
      else
      {
        redirect('/admin_panel/settings/positions');
      }
    }
  }

// End of file.