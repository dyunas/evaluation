<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Subjects_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function get_subjects($subj_id = FALSE)
		{
			if ($subj_id === FALSE)
			{
				$this->db->select('*');
				$this->db->from('subjects_tbl');

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
			
			$this->db->select('*');
			$this->db->from('subjects_tbl');
			$this->db->where('id', $subj_id);

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

		public function insert_new_subject()
   	{
	    $data = array(
	     'subj_name' => $this->input->post('subj_name'),
	     'subj_code' => $this->input->post('subj_code'),
	     'for_level' => $this->input->post('for_level')
	     );

	    if ($this->db->insert('subjects_tbl', $data))
	    {
	      $this->session->set_flashdata('error', 'New subject added!');
	      return TRUE;
	    }
	    else
	    {
	      $this->session->set_flashdata('error', 'Something went wrong while adding new subject! Please try again.');
	      return FALSE;
	    }
  	}

  	public function update_subject($subj_id)
   	{
	    $data = array(
	     'subj_name' => $this->input->post('subj_name'),
	     'subj_code' => $this->input->post('subj_code'),
	     'for_level' => $this->input->post('for_level')
	     );

	    $this->db->where('id', $subj_id);

	    if ($this->db->update('subjects_tbl', $data))
	    {
	      $this->session->set_flashdata('error', 'Subject updated!');
	      return TRUE;
	    }
	    else
	    {
	      $this->session->set_flashdata('error', 'Something went wrong while updating subject! Please try again.');
	      return FALSE;
	    }
  	}

  	public function delete_subject($subj_id)
  	{
  		$this->db->where('id', $subj_id);

	    if ($this->db->delete('subjects_tbl'))
	    {
	      $this->session->set_flashdata('error', 'Subject deleted!');
	      return TRUE;
	    }
	    else
	    {
	      $this->session->set_flashdata('error', 'Something went wrong while deleting subject! Please try again.');
	      return FALSE;
	    }
  	}
	}

// End of file.