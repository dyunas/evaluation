<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_settings extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
			$this->load->model('Admin/Account_settings/Account_settings_model');
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
          $data['title'] = 'Profile';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Account_settings/Profile', $data);
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Edit_profile()
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          $data['title'] = 'Edit Profile';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Account_settings/Edit_profile', $data);
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Confirm_edit_profile()
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Account_settings_model->update_profile())
          {
            redirect('/admin_panel/profile');
          }
          else
          {
            redirect('/admin_panel/account_settings/edit_profile');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Confirm_edit_picture()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
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
              redirect('/admin_panel/profile');
            }
            else
            {
              redirect('/admin_panel/account_settings/edit_profile');
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

    public function Confirm_password_change()
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if ($this->Account_settings_model->change_password())
          {
          	redirect('/admin_panel/profile');
          }
          else
          {
          	redirect('/admin_panel/account_settings/change_pass');
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