<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Executive_model extends CI_Model
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	}

    public function check_eval_status()
    {
      $this->db->select('*');
      $this->db->from('eval_session');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $row = $query->last_row();

        if ($row->is_active == 1)
        {
          $this->session->set_flashdata('error_2', 'Action is not allowed. Evaluation is on going!');
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      else
      {
        return FALSE;
      }
    }

  	public function get_questionnaires()
  	{
  	  $this->db->select('*');
  	  $this->db->from('exec_questions');

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

  	public function insert_new_question()
    {
      $this->db->select('*');
      $this->db->from('exec_questions');

      $query = $this->db->get();

      // if (count($query->result()) < 10)
      // {
      //   $data = array('question' => $this->input->post('question'));

      //   if($this->db->insert('exec_questions', $data))
      //   {
      //     $this->session->set_flashdata('error', 'New Question Added');
      //     return TRUE;
      //   }
      //   else
      //   {
      //     $this->session->set_flashdata('error', 'Something went wrong while inserting new question! Please try again.');
      //     return FALSE;
      //   }
      // }
      // else
      // {
      //   $this->session->set_flashdata('error', 'Maximum number of questions reached! Please delete some questions first then try again!');
      //   return FALSE;
      // }

      $data = array('question' => $this->input->post('question'));

        if($this->db->insert('exec_questions', $data))
        {
          $this->session->set_flashdata('error', 'New Question Added');
          return TRUE;
        }
        else
        {
          $this->session->set_flashdata('error', 'Something went wrong while inserting new question! Please try again.');
          return FALSE;
        }
    }

    public function get_question_dtls($id)
    {
      $this->db->select('*');
      $this->db->from('exec_questions');
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

    public function update_question()
    {
      $data = array('question' => $this->input->post('question'));
      
      $this->db->where('id', $this->input->post('id'));

      if($this->db->update('exec_questions', $data))
      {
        $this->session->set_flashdata('error', 'Question updated!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error', 'Something went wrong while updating the question! Please try again.');
        return FALSE;
      }
    }

    public function delete_question($id)
    {
      $this->db->where('id', $id);

      if($this->db->delete('exec_questions'))
      {
        $this->session->set_flashdata('error', 'Question deleted!');
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