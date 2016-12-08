<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Login_model extends CI_Model
  {
    public function __construct()
		{
		  parent::__construct();

		  $this->load->database();
		}

		public function check_login_credentials()
		{
		  $this->db->where('uname', $this->input->post('uname'));
		  $this->db->where('pword', md5($this->input->post('pword')));
		  $this->db->from('accounts');

		  $query = $this->db->get();

		  if ($query->num_rows() > 0)
		  {
		    $row = $query->row();

		    $user_data = array('id' => $row->id, 'user_type' => 1, 'is_in' => 1);
		    $this->session->set_userdata($user_data);

		    $this->db->set('is_active', 1);
			  $this->db->where('id', $row->id);
			  $this->db->update('accounts');

			return TRUE;
		  }
		  else
		  {
		  	$this->session->set_flashdata('error', 'Invalid Account!');
		    return FALSE;
		  }
		}

		public function logout()
		{
			$data = array('is_active' => 0, 'last_seen' => time());
			$this->db->where('id', $this->session->userdata('id'));

			if ($this->db->update('accounts', $data))
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

// End of file.