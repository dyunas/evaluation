<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_settings_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function change_password()
    {
      $this->db->select('pword');
      $this->db->from('employee_tbl');
      $this->db->where('emp_id', $this->input->post('user_id'));

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $row = $query->row();

        if ($row->pword == md5($this->input->post('opword')))
        {
          $this->db->set('pword', md5($this->input->post('npword')));
          $this->db->where('emp_id', $this->input->post('user_id'));

          if ($this->db->update('employee_tbl'))
          {
            $this->session->set_flashdata('error', 'Password successfully changed!');
            return TRUE;
          }
          else
          {
            $this->session->set_flashdata('error', 'Something went wrong while changing password! Please try again.');
            return FALSE;
          }
        }
        else
        {
          $this->session->set_flashdata('error', 'Incorrect old password! Please try again.');
          return FALSE;
        }
      }
      else
      {
        return FALSE;
      }
    }

    public function update_profile()
    {
      $data = array(
        'fname' => $this->input->post('fname'),
        'mname' => $this->input->post('mname'),
        'lname' => $this->input->post('lname'),
        );

      $this->db->where('id', $this->session->userdata('id'));

      if ($this->db->update('employee_tbl', $data))
      {
        $this->session->set_flashdata('error', 'Profile Updated!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error', 'Something went wrong while updating your profile. Please try again!');
        return FALSE;
      }
    }

    public function update_profile_picture($file_name)
    {
       $data = array('photo' => $file_name);

       $this->db->where('id', $this->session->userdata('id'));

      if ($this->db->update('employee_tbl', $data))
      {
        $this->session->set_flashdata('error', 'Profile picture updated!');
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error', 'Error updating profile picture!');
        return FALSE;
      }
    }
	}

// End of file.