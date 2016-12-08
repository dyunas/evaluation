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
      if ($this->session->userdata('user_type') == 16)
      {
        $this->db->select('pword');
        $this->db->from('hs_student_tbl');
        $this->db->where('stud_id', $this->input->post('user_id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
          $row = $query->row();

          if ($row->pword == md5($this->input->post('opword')))
          {
            $this->db->set('pword', md5($this->input->post('npword')));
            $this->db->where('stud_id', $this->input->post('user_id'));

            if ($this->db->update('hs_student_tbl'))
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
      elseif ($this->session->userdata('user_type') == 15)
      {
        $this->db->select('pword');
        $this->db->from('col_student_tbl');
        $this->db->where('stud_id', $this->input->post('user_id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
          $row = $query->row();

          if ($row->pword == md5($this->input->post('opword')))
          {
            $this->db->set('pword', md5($this->input->post('npword')));
            $this->db->where('stud_id', $this->input->post('user_id'));

            if ($this->db->update('col_student_tbl'))
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
      else
      {
        {
        $this->db->select('pword');
        $this->db->from('elem_student_tbl');
        $this->db->where('stud_id', $this->input->post('user_id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
          $row = $query->row();

          if ($row->pword == md5($this->input->post('opword')))
          {
            $this->db->set('pword', md5($this->input->post('npword')));
            $this->db->where('stud_id', $this->input->post('user_id'));

            if ($this->db->update('elem_student_tbl'))
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
      }
    }

    public function update_profile()
    {
      if ($this->session->userdata('user_type') == 16)
      {
        $data = array(
          'fname' => $this->input->post('fname'),
          'mname' => $this->input->post('mname'),
          'lname' => $this->input->post('lname'),
          'yr_lvl' => $this->input->post('yr_lvl'),
          'section' => $this->input->post('section'),
          );

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('hs_student_tbl', $data))
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
      elseif ($this->session->userdata('user_type') == 15)
      {
        $data = array(
          'fname' => $this->input->post('fname'),
          'mname' => $this->input->post('mname'),
          'lname' => $this->input->post('lname'),
          'course' => $this->input->post('course'),
          'yr_lvl' => $this->input->post('yr_lvl'),
          'section' => $this->input->post('section'),
          );

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('col_student_tbl', $data))
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
      else
      {
        $data = array(
          'fname' => $this->input->post('fname'),
          'mname' => $this->input->post('mname'),
          'lname' => $this->input->post('lname'),
          'yr_lvl' => $this->input->post('yr_lvl'),
          'section' => $this->input->post('section'),
          );

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('elem_student_tbl', $data))
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
    }

    public function update_profile_picture($file_name)
    {
      if ($this->session->userdata('user_type') == 16)
      {
        $data = array('photo' => $file_name);

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('hs_student_tbl', $data))
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
      elseif ($this->session->userdata('user_type') == 15)
      {
        $data = array('photo' => $file_name);

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('col_student_tbl', $data))
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
      else
      {
        $data = array('photo' => $file_name);

        $this->db->where('id', $this->session->userdata('id'));

        if ($this->db->update('elem_student_tbl', $data))
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
	}

// End of file.