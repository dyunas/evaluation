<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Employee_model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function get_employee_tbl($emp_id = FALSE)
    {
      if ($emp_id === FALSE)
      {
        $this->db->select('employee_tbl.*,positions_tbl.id as pid,positions_tbl.position_name');
        $this->db->from('employee_tbl');
        $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
        $this->db->order_by('employee_tbl.emp_id');

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

      $this->db->select('employee_tbl.*,positions_tbl.id as pid,positions_tbl.position_name');
      $this->db->from('employee_tbl');
      $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
      $this->db->where('employee_tbl.emp_id <>', $emp_id);

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

    public function get_employee_dtls($emp_id)
    {
      $this->db->select('employee_tbl.*,positions_tbl.position_name');
      $this->db->from('employee_tbl');
      $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
      $this->db->where('employee_tbl.emp_id', $emp_id);

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

    public function get_root_employee($root_id)
    {
      $this->db->select('employee_tbl.*,positions_tbl.position_name');
      $this->db->from('employee_tbl');
      $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
      $this->db->where('employee_tbl.id', $root_id);

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

	  public function get_employee_by_position($post_id)
    {
	    $this->db->select('employee_tbl.*,positions_tbl.id as pid, positions_tbl.position_name');
      $this->db->from('employee_tbl');
	    $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.position');
      $this->db->where('positions_tbl.user_type', $post_id);
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

	  public function get_employee_by_department($dept_id = null, $where = null)
    {
		  $this->db->select('*');
      $this->db->from('employee_tbl');
	    $this->db->join('department_tbl', 'department_tbl.dprtmnt_name = employee_tbl.department');
	    $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.position');

      if($dept_id==null)
      {
        //
	    }
      else
      {
		    $this->db->where('department', $dept_id);
	    }
      if(!$where)
      {
		    //
	    }
      else
      {
		    $this->db->where($where);
	    }
	    
      $this->db->order_by('department_tbl.dprtmnt_name');
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

    public function get_positions_tbl()
    {
      $this->db->select('*');
      $this->db->from('positions_tbl');
      $this->db->where('user_type <>', 15);
      $this->db->where('user_type <>', 16);

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

    public function get_department_tbl($dprtmnt = FALSE)
    {
      if ($dprtmnt === FALSE)
      {
        $this->db->select('*');
        $this->db->from('department_tbl');

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
      $this->db->from('department_tbl');

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
        return FALSE;
      }
    }

    public function get_col_subjects_tbl()
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

    public function get_hs_subjects_tbl()
    {
      $this->db->select('*');
      $this->db->from('subjects_tbl');
      $this->db->where('for_level <>', 'College');
      $this->db->where('for_level <>', 'Elem');

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

    public function get_supervisions_tbl($emp_id)
    {
      $this->db->select('*');
      $this->db->from('supervision_tbl');
      $this->db->where('emp_id', $emp_id);

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

    public function get_other_supervisions_tbl($emp_id)
    {
      $this->db->select('*');
      $this->db->from('other_supervision_tbl');
      $this->db->join('employee_tbl', 'other_supervision_tbl.assignee_id = employee_tbl.emp_id');
      $this->db->join('positions_tbl', 'employee_tbl.user_type = positions_tbl.user_type');
      $this->db->where('other_supervision_tbl.evltr_id', $emp_id);

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

    // public function insert_supervisions($emp_id)
    // {
    //   if($this->input->post('course'))
    //   {
    //     $count = count($this->input->post('course'));

    //     if ($count > 0)
    //     {
    //       for($x=0; $x <= ($count - 1); $x++)
    //       {
    //         $data = array(
    //           'emp_id' => $emp_id,
    //           'course' => $this->input->post('course['.$x.']'),
    //           'yr_lvl' => $this->input->post('yr_lvl['.$x.']'),
    //           'section' => $this->input->post('section['.$x.']'),
    //           'subject' => $this->input->post('subject['.$x.']')
    //           );

    //         $this->db->insert('supervision_tbl', $data);
    //       }

    //       return TRUE;
    //     }
    //     else
    //     {
    //       return FALSE;
    //     }
    //   }
    //   else
    //   {
    //     $count = count($this->input->post('yr_lvl'));

    //     if ($count > 0)
    //     {
    //       for($x=0; $x <= ($count - 1); $x++)
    //       {
    //         $data = array(
    //           'emp_id' => $emp_id,
    //           'yr_lvl' => $this->input->post('yr_lvl['.$x.']'),
    //           'section' => $this->input->post('section['.$x.']'),
    //           'subject' => $this->input->post('subject['.$x.']')
    //           );

    //         $this->db->insert('supervision_tbl', $data);
    //       }

    //       return TRUE;
    //     }
    //     else
    //     {
    //       return FALSE;
    //     }
    //   }
    // }

    public function insert_other_supervisions($emp_id)
    {
      $count = count($this->input->post('assignee'));

      if ($count > 0)
      {
        for($x=0; $x <= ($count - 1); $x++)
        {
          $data = array(
            'evltr_id' => $emp_id,
            'assignee_id' => $this->input->post('assignee['.$x.']')
            );

          $this->db->insert('other_supervision_tbl', $data);
        }

        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('error', 'Error adding supervisions!');
        return FALSE;
      }
    }

    public function insert_new_employee()
    {
      $data = array(
        'user_type' => $this->input->post('position'),
        'pword' => md5('cdsp12345'),
      	'emp_id' => $this->input->post('emp_id'),
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
        'position' => $this->input->post('position'),
        'department' => $this->input->post('department'),
        'date_created' => time()
      	);

      if ($this->db->insert('employee_tbl', $data))
      {
        $this->session->set_flashdata('error', 'New employee added!');
        return TRUE;
      }
      else
      {
      	$this->session->set_flashdata('error', 'Something went wrong while adding new employee! Please try again.');
      	return FALSE;
      }
    }

    public function update_employee()
    {
      $data = array(
      	'fname' => $this->input->post('fname'),
      	'mname' => $this->input->post('mname'),
      	'lname' => $this->input->post('lname'),
        'position' => $this->input->post('position'),
        'department' => $this->input->post('department'),
      	'last_mod' => time()
      	);

      $this->db->where('emp_id', $this->input->post('emp_id'));

      if ($this->db->update('employee_tbl', $data))
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

    public function delete_employee($id)
    {
      $this->db->where('emp_id', $id);

      if ($this->db->delete('employee_tbl'))
      {
      	$this->db->where('emp_id', $id);

        $query = $this->db->get('employee_tbl');

        if ($query->num_rows() > 0)
        {
          $result = $query->row();

          $this->db->where('parent_node', $result->id);

          if ($this->db->delete('org_chart'))
          {
            $thid->db->where('child_node', $reuslt->id);

            if ($this->db->delete('org_chart'))
            {
              $this->session->set_flashdata('error', 'Record deleted!');
              return TRUE;
            }
            else
            {
              return FALSE;
            }
          }
        }
      }
      else
      {
      	$this->session->set_flashdata('error_2', 'Error deleting record! Please try again.');
      	return FALSE;
      }
    }

    public function delete_supervisions($emp_id, $row_id)
    {
      $this->db->where('emp_id', $emp_id);
      $this->db->where('id', $row_id);

      if ($this->db->delete('supervision_tbl'))
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

    public function delete_other_supervisions($evltr, $emp_id)
    {
      $this->db->where('evltr_id', $evltr);
      $this->db->where('assignee_id', $emp_id);

      if ($this->db->delete('other_supervision_tbl'))
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

    public function insertOrg($data)
    {
      return $this->db->insert('org_chart', $data);
    }

    public function get_employee($where=array())
    {
      $this->db->select('employee_tbl.*,positions_tbl.id as pid, positions_tbl.position_name');
      $this->db->from('employee_tbl');
      $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type','left');
      $this->db->where_not_in('employee_tbl.id',$where);

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

	  public function removeOrg($data)
    {
		  $this->db->where('child_node',$data);
		
		  if($this->db->delete('org_chart'))
      {
			  return TRUE;
		  }
		  else
      {
			  return FALSE;
		  }
	  }

	  // public function get_employee_tbls()
   //  {
   //    $this->db->select('employee_tbl.*,positions_tbl.id as pid,positions_tbl.position_name');
   //    $this->db->from('employee_tbl');
   //    $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');

   //    $query = $this->db->get();

   //    if ($query->num_rows() > 0)
   //    {
   //      return $query->result();
   //    }
   //    else
   //    {
   //      return FALSE;
   //    }
   //  }
  }

// End of file.