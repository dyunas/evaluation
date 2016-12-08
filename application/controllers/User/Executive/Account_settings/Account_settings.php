<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_settings extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User/Executive/Dashboard/Dashboard_model');
			$this->load->model('User/Executive/Account_settings/Account_settings_model');
      $this->load->model('Admin/Settings/Positions_model');
      $this->load->model('Admin/Settings/Department_model');
		}

		public function Change_pass()
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
        elseif ($this->session->userdata('user_type') == 7 OR $this->session->userdata('user_type') == 8 OR $this->session->userdata('user_type') == 9 OR $this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          $data['title'] = 'Change Password';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Executive/Account_settings/Change_password');
        }
      }
      else
      {
        redirect('/user');
      }
		}

		public function Confirm_password_change()
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
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          if ($this->Account_settings_model->change_password())
          {
          	redirect('/executive/dashboard');
          }
          else
          {
          	redirect('/executive/account_settings/change_pass');
          }
        }
      }
      else
      {
        redirect('/user');
      }
		}

    public function Edit_profile()
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
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          $data['title'] = 'Edit Profile';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['positions'] = $this->Positions_model->get_positions_tbl();
          $data['departments'] = $this->Department_model->get_department_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('User/Executive/Account_settings/Edit_profile');
        }
      }
      else
      {
        redirect('/user');
      }
    }

    public function Confirm_edit_profile()
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
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          if ($this->Account_settings_model->update_profile())
          {
            redirect('/executive/dashboard');
          }
          else
          {
            redirect('/executive/account_settings/edit_profile');
          }
        }
      }
      else
      {
        redirect('/user');
      }
    }

    public function Confirm_edit_picture()
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
        elseif ($this->session->userdata('user_type') == 10 OR $this->session->userdata('user_type') == 11 OR $this->session->userdata('user_type') == 12 OR $this->session->userdata('user_type') == 13 OR $this->session->userdata('user_type') == 14 OR $this->session->userdata('user_type') == 17)
        {
          redirect('/employee/dashboard');
        }
        else
        {
          $config['upload_path'] = 'assets/uploads/profile/';
          $config['file_name'] = md5(rand(0, 100)).'.jpg';
          $config['allowed_types'] = 'jpg|jpeg';
          $config['max_size']     = '10240';
          $config['max_width'] = '0';
          $config['max_height'] = '0';

          $this->load->library('upload', $config);

          if ($this->upload->do_upload('profile_pic'))
          {
            $file = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['full_path'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']         = 180;
            $config['height']       = 200;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            if ($this->Account_settings_model->update_profile_picture($file['file_name']))
            {
              redirect('/executive/dashboard');
            }
            else
            {
              redirect('/executive/account_settings/edit_profile');
            }
          }
          else
          {
            //error!
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