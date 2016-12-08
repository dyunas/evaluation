<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Subjects extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
			$this->load->model('Admin/Settings/Subjects_model');
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
          $data['title'] = 'Subjects Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['subjects'] = $this->Subjects_model->get_subjects();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Subjects/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function New_subject()
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Subjects Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Subjects/New_subject');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Insert_subject()
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Subjects_model->insert_new_subject())
          {
            redirect('admin_panel/settings/subjects');
          }
          else
          {
            redirect('admin_panel/settings/subjects/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Edit_subject($subj_id)
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Subjects Settings';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['subj'] = $this->Subjects_model->get_subjects($subj_id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Settings/Subjects/Edit_subject');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Update_subject($subj_id)
		{
			if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Subjects_model->update_subject($subj_id))
          {
            redirect('admin_panel/settings/subjects');
          }
          else
          {
            redirect('admin_panel/settings/subjects/edit/'.$subj_id);
          }
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function Delete_subject($subj_id)
		{
			if ($this->Subjects_model->delete_subject($subj_id))
      {
        redirect('/admin_panel/settings/subjects');
      }
      else
      {
        redirect('/admin_panel/settings/subjects');
      }
		}
	} 

// End of file.