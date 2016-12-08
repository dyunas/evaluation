<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class College_model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function get_subjects_tbl()
    {
      $this->db->select('*');
      $this->db->from('subjects_tbl');
      $this->db->where('for_level', 'College');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_college_teachers()
    {
      $this->db->select('*');
      $this->db->from('employee_tbl');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_student_tbl()
    {
      $this->db->select('*');
      $this->db->from('col_student_tbl');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
      	return $query->result();
      }
      else
      {
      	return FALSE;
      }
    }

    public function get_student_dtls($stud_id)
    {
      $this->db->select('*');
      $this->db->from('col_student_tbl');
      $this->db->where('stud_id', $stud_id);

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
      	return $query->row();
      }
      else
      {
      	return FALSE;
      }
    }

    public function get_student_subj_tbl($stud_id)
    {
      $this->db->select('student_subj_tbl.*, subjects_tbl.subj_name, employee_tbl.id as $eid, employee_tbl.*');
      $this->db->from('student_subj_tbl');
      $this->db->join('subjects_tbl', 'student_subj_tbl.subject = subjects_tbl.subj_code');
      $this->db->join('employee_tbl', 'student_subj_tbl.emp_id = employee_tbl.emp_id');
      $this->db->where('student_subj_tbl.stud_id', $stud_id);

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_course_tbl()
    {
      $this->db->select('*');
      $this->db->from('course_tbl');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }
      else
      {
        return  FALSE;
      }
    }

    public function get_course_dtls($course)
    {
      $this->db->select('course');
      $this->db->from('course_tbl');
      $this->db->where('course_code', $course);

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_user_type()
    {
      $this->db->select('*');
      $this->db->from('positions_tbl');
      $this->db->where('position_name', 'College Student');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    public function insert_subjects($stud_id)
    {
      if ($this->input->post('subject'))
      {
        $count = count($this->input->post('subject'));

        if ($count > 0)
        {
          for($x=0; $x <= ($count - 1); $x++)
          {
            $data = array(
              'emp_id' => $this->input->post('teacher['.$x.']'),
              'stud_id' => $stud_id,
              'subject' => $this->input->post('subject['.$x.']')
              );

            $this->db->insert('student_subj_tbl', $data);
          }

          $this->session->set_flashdata('error', 'Subject added!');
          return TRUE;
        }
        else
        {
          $this->session->set_flashdata('error', 'Something went wrong while adding new employee! Please try again.');
          return FALSE;
        }
      }
    }

    public function delete_subject($stud_id, $emp_id, $subj)
    {
      $this->db->where('stud_id', $stud_id);
      $this->db->where('emp_id', $emp_id);
      $this->db->where('subject', $subj);

      if ($this->db->delete('student_subj_tbl'))
      {
        $this->session->set_flashdata('error', 'Subject deleted!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error_2', 'Error deleting subject! Please try again.');
        return FALSE;
      }
    }

    public function insert_new_student()
    {
      $data = array(
        'user_type' => $this->input->post('user_type'),
      	'pword' => md5('cdsp12345'),
      	'stud_id' => $this->input->post('stud_id'),
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
        'course' => $this->input->post('course'),
      	'yr_lvl' => $this->input->post('yr_lvl'),
      	'section' => $this->input->post('section'),
        'date_created' => time()
      	);

      if ($this->db->insert('col_student_tbl', $data))
      {
        $this->session->set_flashdata('error', 'New student added!');
        return TRUE;
      }
      else
      {
      	$this->session->set_flashdata('error', 'Something went wrong while adding new student! Please try again.');
      	return FALSE;
      }
    }

    public function update_student()
    {
      $data = array(
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
        'course' => $this->input->post('course'),
      	'yr_lvl' => $this->input->post('yr_lvl'),
      	'section' => $this->input->post('section'),
      	'last_mod' => time()
      	);

      $this->db->where('id', $this->input->post('id'));

      if ($this->db->update('col_student_tbl', $data))
      {
      	$this->session->set_flashdata('error', 'Record updated!');
      	return TRUE;
      }
      else
      {
      	$this->session->set_flashdata('error', 'Something went wrong while updating record! Please try again.');
      	return FALSE;
      }
    }

    public function change_password($stud_id)
    {
      $this->db->set('pword', $this->input->post('npword'));
      $this->db->where('stud_id', $stud_id);

      if ($this->db->update('col_student_tbl'))
      {
        $this->session->set_flashdata('error', 'Password successfully changed!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error_2', 'Something went wrong while changing password! Please try again.');
        return FALSE;
      }
    }

    public function delete_student($id)
    {
      $this->db->where('id', $id);

      if ($this->db->delete('col_student_tbl'))
      {
      	$this->session->set_flashdata('error', 'Record deleted!');
      	return TRUE;
      }
      else
      {
      	$this->session->set_flashdata('error_2', 'Error deleting record! Please try again.');
      	return FALSE;
      }
    }
  }

// End of file.