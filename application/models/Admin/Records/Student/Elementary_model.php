<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Elementary_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_student_tbl()
		{
			$this->db->select('*');
			$this->db->from('elem_student_tbl');

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

		public function get_user_type()
		{
			$this->db->select('user_type');
			$this->db->from('positions_tbl');
			$this->db->where('position_name', 'Elementary Student');

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

		public function insert_new_student()
		{
			$data = array(
        'user_type' => $this->input->post('user_type'),
      	'pword' => md5('cdsp12345'),
      	'stud_id' => $this->input->post('stud_id'),
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
      	'yr_lvl' => $this->input->post('grd_lvl'),
      	'section' => $this->input->post('section'),
        'date_created' => time()
      	);

      if ($this->db->insert('elem_student_tbl', $data))
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

		public function get_student_dtls($stud_id)
		{
			$this->db->select('*');
			$this->db->from('elem_student_tbl');
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

		public function get_subjects_tbl()
    {
      $this->db->select('*');
      $this->db->from('subjects_tbl');
      $this->db->where('for_level <>', 'College');
      $this->db->where('for_level <>', 'Sr. High');
      $this->db->where('for_level <>', 'Jr. High');

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

    public function get_elem_teachers()
    {
    	$this->db->select('*');
    	$this->db->from('employee_tbl');
    	$this->db->where('user_type', 14);

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

    public function update_student()
    {
      $data = array(
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
      	'yr_lvl' => $this->input->post('grd_lvl'),
      	'section' => $this->input->post('section'),
      	'last_mod' => time()
      	);

      $this->db->where('id', $this->input->post('id'));

      if ($this->db->update('elem_student_tbl', $data))
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

    public function delete_student($id)
    {
      $this->db->where('id', $id);

      if ($this->db->delete('elem_student_tbl'))
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

// End of file