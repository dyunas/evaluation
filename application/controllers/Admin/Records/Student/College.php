<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class College extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->model('Admin/Dashboard/Dashboard_model');
  	  $this->load->model('Admin/Records/Student/College_model');
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
          $data['records'] = $this->College_model->get_student_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/College/Index');
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

    public function Section()
    {
      if($this->input->is_ajax_request())
      {
        $value = $this->input->get('code');

        if ($value == '1st year')
        {
          $html = '<select class="col-xs-10 col-sm-6" id="section" name="section">';
          $html .= '<option></option>';
          $html .= '<option value="1-11">1-11</option>';
          $html .= '<option value="1-12">1-12</option>';
          $html .= '<option value="2-11">2-11</option>';
          $html .= '<option value="2-12">2-12</option>';
          $html .= '<option value="3-11">3-11</option>';
          $html .= '<option value="3-12">3-12</option>';
          $html .= '<option value="4-11">4-11</option>';
          $html .= '<option value="4-12">4-12</option>';
          $html .= '</select>';

          echo $html;
        }

        elseif ($value == '2nd year')
        {
          $html = '<select class="col-xs-10 col-sm-6" id="section" name="section">';
          $html .= '<option></option>';
          $html .= '<option value="1-21">1-21</option>';
          $html .= '<option value="1-22">1-22</option>';
          $html .= '<option value="2-21">2-21</option>';
          $html .= '<option value="2-22">2-22</option>';
          $html .= '<option value="3-21">3-21</option>';
          $html .= '<option value="3-22">3-22</option>';
          $html .= '<option value="4-21">4-21</option>';
          $html .= '<option value="4-22">4-22</option>';
          $html .= '</select>';

          echo $html;
        }

        elseif ($value == '3rd year')
        {
          $html = '<select class="col-xs-10 col-sm-6" id="section" name="section">';
          $html .= '<option></option>';
          $html .= '<option value="1-31">1-31</option>';
          $html .= '<option value="1-32">1-32</option>';
          $html .= '<option value="2-31">2-31</option>';
          $html .= '<option value="2-32">2-32</option>';
          $html .= '<option value="3-31">3-31</option>';
          $html .= '<option value="3-32">3-32</option>';
          $html .= '<option value="4-31">4-31</option>';
          $html .= '<option value="4-32">4-32</option>';
          $html .= '</select>';

          echo $html;
        }

        elseif ($value == '4th year')
        {
          $html = '<select class="col-xs-10 col-sm-6" id="section" name="section">';
          $html .= '<option></option>';
          $html .= '<option value="1-41">1-41</option>';
          $html .= '<option value="1-42">1-42</option>';
          $html .= '<option value="2-41">2-41</option>';
          $html .= '<option value="2-42">2-42</option>';
          $html .= '<option value="3-41">3-41</option>';
          $html .= '<option value="3-42">3-42</option>';
          $html .= '<option value="4-41">4-41</option>';
          $html .= '<option value="4-42">4-42</option>';
          $html .= '</select>';

          echo $html;
        }
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
          $data['courses'] = $this->College_model->get_course_tbl();
          $data['type'] = $this->College_model->get_user_type();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/College/New_student');
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
          if ($this->College_model->insert_new_student())
          {
          	redirect('/admin_panel/student_records/college');
          }
          else
          {
          	redirect('/admin_panel/student_records/college/new');
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
          $data['edit'] = $this->College_model->get_student_dtls($stud_id);
          $data['courses'] = $this->College_model->get_course_tbl();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/College/Edit_student');
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
          $data['info'] = $this->College_model->get_student_dtls($stud_id);
          $data['cinfo'] = $this->College_model->get_course_dtls($data['info']->course);
          $data['subjects'] = $this->College_model->get_student_subj_tbl($stud_id);

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/College/View_student');
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
          $data['info'] = $this->College_model->get_student_dtls($stud_id);
          $data['subjects'] = $this->College_model->get_subjects_tbl();
          $data['teachers'] = $this->College_model->get_college_teachers();

          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Records/Student/College/Add_subjects');
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
          if ($this->College_model->insert_subjects($stud_id))
          {
            redirect('/admin_panel/student_records/college/'.$stud_id);
          }
          else
          {
            redirect('/admin_panel/student_records/college/add_sub/'.$stud_id);
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
          if ($this->College_model->delete_subject($stud_id, $emp_id, $subj))
          {
            redirect('/admin_panel/student_records/college/'.$stud_id);
          }
          else
          {
            redirect('/admin_panel/student_records/college/'.$stud_id);
          }
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
          if ($this->College_model->update_student())
          {
          	redirect('/admin_panel/student_records/college/'.$this->input->post('stud_id'));
          }
          else
          {
          	redirect('/admin_panel/student_records/college/edit/'.$this->input->post('stud_id'));
          }
        }
      }
      else
      {
        redirect('/admin');
      }
  	}

  	public function Delete_student($id)
  	{
  	  if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }

        else
        {
          if ($this->College_model->delete_student($id))
          {
          	redirect('/admin_panel/student_records/college');
          }
          else
          {
          	redirect('/admin_panel/student_records/college');
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