<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Course_model extends CI_Model
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	}

  	public function get_courses_tbl()
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
  	  	return FALSE;
  	  }
  	}

  	public function insert_new_course()
  	{
  	  $this->db->select('*');
      $this->db->from('course_tbl');
      $this->db->where('course', $this->input->post('course'));

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $this->session->set_flashdata('error', 'Course already exists!');
        $this->session->set_flashdata('course', $this->input->post('course'));
        $this->session->set_flashdata('course_code', $this->input->post('course_code'));
        return FALSE;
      }
      else
      {
        $this->db->select('*');
        $this->db->from('course_tbl');
        $this->db->where('course_code', $this->input->post('course_code'));

        $query_2 = $this->db->get();

        if ($query_2->num_rows() > 0)
        {
          $this->session->set_flashdata('error', 'Course code already in use!');
          $this->session->set_flashdata('course', $this->input->post('course'));
          $this->session->set_flashdata('course_code', $this->input->post('course_code'));
          return FALSE;
        }
        else
        {
          $data = array(
            'course' => $this->input->post('course'),
            'course_code' => $this->input->post('course_code')
            );

          if ($this->db->insert('course_tbl', $data))
          {
            $this->session->set_flashdata('error', 'New Course Added!');
            return TRUE;
          }
          else
          {
            $this->session->set_flashdata('error', 'Something went wrong while adding new course! Please try again.');
            $this->session->set_flashdata('course', $this->input->post('course'));
            $this->session->set_flashdata('course_code', $this->input->post('course_code'));
            return FALSE;
          }
        }
      }
  	}

  	public function get_course_dtls($id)
  	{
  	  $this->db->select('*');
  	  $this->db->from('course_tbl');
  	  $this->db->where('id', $id);

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

  	public function update_course()
  	{
  	  $this->db->select('*');
  	  $this->db->from('course_tbl');
  	  $this->db->where('course', $this->input->post('course'));

  	  $query = $this->db->get();

  	  if ($query->num_rows() > 0)
  	  {
  	  	$row = $query->row();

  	  	if ($row->id != $this->input->post('id'))
  	  	{
  	  	  $this->session->set_flashdata('error', 'Course already exists!');
  	  	  return FALSE;
  	  	}
  	  	else
  	  	{
  	  	  $this->db->select('*');
  	  	  $this->db->from('course_tbl');
  	  	  $this->db->where('course_code', $this->input->post('course_code'));

  	  	  $query2 = $this->db->get();

  	  	  if ($query2->num_rows() > 0)
  	  	  {
  	  	  	$row2 = $query2->row();

  	  	  	if($row2->id != $this->input->post('id'))
  	  	  	{
  	  	  	  $this->session->set_flashdata('error', 'Course code already in use!');
  	  	      return FALSE;
  	  	  	}
  	  	  	else
  	  	  	{
  	  	  	  $data = array(
  	  	  		'course' => $this->input->post('course'),
  	  	  		'course_code' => $this->input->post('course_code')
  	  	  	  );

  	  	      $this->db->where('id', $this->input->post('id'));

  	  	      if ($this->db->update('course_tbl', $data))
  	  	      {
  	  	  	    $this->session->set_flashdata('error', 'Course Updated!');
  	  	  	    return TRUE;
  	  	      }
	  	  	  else
	  	  	  {
	  	  	  	$this->session->set_flashdata('error', 'Something went wrong while updating course! Please try again.');
	  	  	  	return FALSE;
	  	  	  }
  	  	  	}
  	  	  }
  	  	  else
  	  	  {
  	  	  	$data = array(
  	  	  	  'course' => $this->input->post('course'),
  	  	  	  'course_code' => $this->input->post('course_code')
  	  	  	);

  	  	  	$this->db->where('id', $this->input->post('id'));

  	  	    if ($this->db->update('course_tbl', $data))
  	  	    {
  	  	  	  $this->session->set_flashdata('error', 'Course Updated!');
  	  	  	  return TRUE;
  	  	  	}
  	  	  	else
  	  	  	{
  	  	  	  $this->session->set_flashdata('error', 'Something went wrong while updating course! Please try again.');
  	  	  	  return FALSE;
  	  	  	}
  	  	  }
  	  	}
  	  }
  	  else
  	  {
  	  	$this->db->select('*');
  	    $this->db->from('course_tbl');
  	    $this->db->where('course_code', $this->input->post('course_code'));

  	    $query3 = $this->db->get();

  	    if ($query3->num_rows() > 0)
  	    {
  	      $row = $query3->row();

  	      if ($row->id != $this->input->post('id'))
  	      {
  	      	$this->session->set_flashdata('error', 'Course code already in use!');
  	  	    return FALSE;
  	      }
  	      else
  	      {
  	      	$data = array(
  	  	  	  'course' => $this->input->post('course'),
  	  	  	  'course_code' => $this->input->post('course_code')
  	  	  	);

  	  	    $this->db->where('id', $this->input->post('id'));

  	  	    if ($this->db->update('course_tbl', $data))
  	  	    {
  	  	  	  $this->session->set_flashdata('error', 'Course Updated!');
  	  	  	  return TRUE;
  	  	    }
	  	  	else
	  	  	{
	  	  	  $this->session->set_flashdata('error', 'Something went wrong while updating course! Please try again.');
	  	  	  return FALSE;
	  	  	}
  	      }
  	    }
  	    else
  	    {
  	      $data = array(
  	  	  	'course' => $this->input->post('course'),
  	  	  	'course_code' => $this->input->post('course_code')
  	  	  );

  	  	  $this->db->where('id', $this->input->post('id'));

  	  	  if ($this->db->update('course_tbl', $data))
  	  	  {
  	  	  	$this->session->set_flashdata('error', 'Course Updated!');
  	  	  	return TRUE;
  	  	  }
  	  	  else
  	  	  {
  	  	  	$this->session->set_flashdata('error', 'Something went wrong while updating course! Please try again.');
  	  	  	return FALSE;
  	  	  }
  	    }
  	  }
  	}

  	public function delete_course($id)
  	{
  	  $this->db->where('id', $id);

      if($this->db->delete('course_tbl'))
      {
        $this->session->set_flashdata('error', 'Course deleted!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error_2', 'Something went wrong while deleting the question! Please try again.');
        return FALSE;
      }
  	}
  }

// End of file.