<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_model extends CI_Model
  {
  	public function __construct()
  	{
  	  parent::__construct();
  	  $this->load->database();
  	}

  	public function check_login_credentials()
		{
		  $this->db->where('stud_id', $this->input->post('user_id'));
		  $this->db->where('pword', md5($this->input->post('pword')));
		  $this->db->from('hs_student_tbl');

		  $query = $this->db->get();

		  if ($query->num_rows() > 0)
		  {
		  	$row = $query->row();

		    $user_data = array('id' => $row->id, 'user_type' => $row->user_type, 'is_in' => 1);
		    $this->session->set_userdata($user_data);

		    $this->db->set('is_active', 1);
		    $this->db->where('id', $row->id);
		    $this->db->update('hs_student_tbl');

			return TRUE;
		  }
		  else
		  {
		  	$this->db->where('stud_id', $this->input->post('user_id'));
		    $this->db->where('pword', md5($this->input->post('pword')));
		    $this->db->from('col_student_tbl');

		    $query2 = $this->db->get();

		    if ($query2->num_rows() > 0)
		    {
		      $row2 = $query2->row();

		      $user_data = array('id' => $row2->id, 'user_type' => $row2->user_type, 'is_in' => 1);
		      $this->session->set_userdata($user_data);

		      $this->db->set('is_active', 1);
		      $this->db->where('id', $row2->id);
		      $this->db->update('col_student_tbl');

			  return TRUE;
		    }
		    else
		    {
			  	$this->db->where('stud_id', $this->input->post('user_id'));
			    $this->db->where('pword', md5($this->input->post('pword')));
			    $this->db->from('elem_student_tbl');

			    $query3 = $this->db->get();

			    if ($query3->num_rows() > 0)
			    {
			    	$row3 = $query3->row();

			    	$user_data = array('id' => $row3->id, 'user_type' => $row3->user_type, 'is_in' => 1);
			      $this->session->set_userdata($user_data);

			      $this->db->set('is_active', 1);
			      $this->db->where('id', $row3->id);
			      $this->db->update('elem_student_tbl');

			      return TRUE;
			    }
			    else
			    {
			    	$this->db->where('emp_id', $this->input->post('user_id'));
			      $this->db->where('pword', md5($this->input->post('pword')));
			      $this->db->from('employee_tbl');

			      $query4 = $this->db->get();

			      if ($query4->num_rows() > 0)
			      {
			      	$row4 = $query4->row();

			        $user_data = array('id' => $row4->id, 'user_type' => $row4->user_type, 'is_in' => 1);
			        $this->session->set_userdata($user_data);

			        $this->db->set('is_active', 1);
			        $this->db->where('id', $row4->id);
			        $this->db->update('employee_tbl');

				    return TRUE;
			      }
			      else
			      {
			      	$this->session->set_flashdata('error_2', 'Invalid Account!');
			      	return FALSE;
			      }
			    }
		    }
		  }
		}

		public function reset_pword()
		{
			$this->db->where('stud_id', $this->input->post('user_id'));
			$this->db->from('col_student_tbl');
			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				$this->db->set('pword', md5('cdsp12345'));
				$this->db->where('stud_id', $this->input->post('user_id'));

				if ($this->db->update('col_student_tbl'))
				{
					$this->session->set_flashdata('error', 'Password was reset to default!');
					return TRUE;
				}
				else
				{
					$this->session->set_flashdata('error', 'Error resetting password! Try again.');
					return FALSE;
				}
			}
			else
			{
				$this->db->where('stud_id', $this->input->post('user_id'));
				$this->db->from('hs_student_tbl');
				$query2 = $this->db->get();

				if ($query2->num_rows() > 0)
				{
					$this->db->set('pword', md5('cdsp12345'));
					$this->db->where('stud_id', $this->input->post('user_id'));

					if ($this->db->update('hs_student_tbl'))
					{
						$this->session->set_flashdata('error', 'Password was reset to default!');
						return TRUE;
					}
					else
					{
						$this->session->set_flashdata('error', 'Error resetting password! Try again.');
						return FALSE;
					}
				}
				else
				{
					$this->db->where('emp_id', $this->input->post('user_id'));
					$this->db->from('employee_tbl');
					$query2 = $this->db->get();

					if ($query2->num_rows() > 0)
					{
						$this->db->set('pword', md5('cdsp12345'));
						$this->db->where('emp_id', $this->input->post('user_id'));

						if ($this->db->update('employee_tbl'))
						{
							$this->session->set_flashdata('error', 'Password was reset to default!');
							return TRUE;
						}
						else
						{
							$this->session->set_flashdata('error', 'Error resetting password! Try again.');
							return FALSE;
						}
					}
				}
			}
		}

		public function Logout()
		{
		  if ($this->session->userdata('user_type') == 16)
		  {
		  	$data = array('is_active' => 0, 'last_seen' => time());
		    $this->db->where('id', $this->session->userdata('id'));

		    if ($this->db->update('hs_student_tbl', $data))
		    {
		      $this->session->sess_destroy();
		      return TRUE;
		    }
		    else
		    {
		      return FALSE;
		    }
		  }
		  elseif ($this->session->userdata('user_type') == 15)
		  {
		  	$data = array('is_active' => 0, 'last_seen' => time());
		    $this->db->where('id', $this->session->userdata('id'));

		    if ($this->db->update('col_student_tbl', $data))
		    {
		      $this->session->sess_destroy();
		      return TRUE;
		    }
		    else
		    {
		      return FALSE;
		    }
		  }
		  else
		  {
		  	$data = array('is_active' => 0, 'last_seen' => time());
		    $this->db->where('id', $this->session->userdata('id'));

		    if ($this->db->update('employee_tbl', $data))
		    {
		      $this->session->sess_destroy();
		      return TRUE;
		    }
		    else
		    {
		      return FALSE;
		    }
		  }
		}
  }

// End of file.