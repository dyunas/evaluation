<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Elementary extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/Dashboard/Dashboard_model');
			$this->load->model('Admin/Records/Student/Elementary_model');
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
          $data['title'] = 'Student\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['records'] = $this->Elementary_model->get_student_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/Elementary/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
		}

		public function New_student()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Student\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['type'] = $this->Elementary_model->get_user_type();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/Elementary/New_student');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Insert_student()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Elementary_model->insert_new_student())
          {
          	redirect('/admin_panel/student_records/elem');
          }
          else
          {
          	redirect('/admin_panel/student_records/elem/new');
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function View_student($stud_id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Student\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['info'] = $this->Elementary_model->get_student_dtls($stud_id);
          $data['subjects'] = $this->Elementary_model->get_student_subj_tbl($stud_id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/Elementary/View_student');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Add_subjects($stud_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Student\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['info'] = $this->Elementary_model->get_student_dtls($stud_id);
          $data['subjects'] = $this->Elementary_model->get_subjects_tbl();
          $data['teachers'] = $this->Elementary_model->get_elem_teachers();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/Elementary/Add_subject');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Insert_subjects($stud_id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Elementary_model->insert_subjects($stud_id))
          {
            redirect('/admin_panel/student_records/elem/'.$stud_id);
          }
          else
          {
            redirect('/admin_panel/student_records/elem/add_sub/'.$stud_id);
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Delete_subject($stud_id, $emp_id, $subj)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Elementary_model->delete_subject($stud_id, $emp_id, $subj))
          {
            redirect('/admin_panel/student_records/elem/'.$stud_id);
          }
          else
          {
            redirect('/admin_panel/student_records/elem/'.$stud_id);
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Edit_student($stud_id)
    {
    	if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          $data['title'] = 'Student\'s Record';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['edit'] = $this->Elementary_model->get_student_dtls($stud_id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/Elementary/Edit_student');
        }
      }
      else
      {
        redirect('/admin');
      }
    }
    public function Update_student()
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->Elementary_model->update_student())
          {
          	redirect('/admin_panel/student_records/elem/'.$this->input->post('stud_id'));
          }
          else
          {
          	redirect('/admin_panel/student_records/elem/edit/'.$this->input->post('stud_id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}
	}

// End of file