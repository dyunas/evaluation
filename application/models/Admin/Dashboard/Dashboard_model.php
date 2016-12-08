<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard_model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_acct_details()
    {
      $this->db->select('*');
      $this->db->from('accounts');
      $this->db->where('id', $this->session->userdata('id'));

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $result = $query->row_array();

        return $result;
      }
    }

    public function check_eval_active()
    {
      $this->db->select('*');
      $this->db->from('eval_session');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->last_row();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_last_eval_session()
    {
      $this->db->select('*');
      $this->db->from('eval_session');
      $this->db->where('is_active', 0);

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->last_row();
      }
      else
      {
        return FALSE;
      }
    }

    public function set_eval_status($id)
    {
      $date = time();

      if ($id == 1)
      {
        $data = array(
        'is_active' => $id,
        'date' => $date,
        'status' => 'started'
        );
      }
      else
      {
        $data = array(
        'is_active' => $id,
        'date' => $date,
        'status' => 'ended'
        );
      }

      if($this->db->insert('eval_session', $data))
      {
        if ($data['status'] == 'started')
        {
          $this->db->select('col_student_tbl.stud_id, col_student_tbl.fname, col_student_tbl.mname, col_student_tbl.lname, col_student_tbl.user_type, positions_tbl.position_name, positions_tbl.user_type');
          $this->db->from('col_student_tbl');
          $this->db->join('positions_tbl', 'positions_tbl.user_type = col_student_tbl.user_type');
          $col = $this->db->get();

          if ($col->num_rows() > 0)
          {
            foreach($col->result() as $val)
            {
              $col_data = array(
                'user_id' => $val->stud_id,
                'name' => $val->lname.', '.$val->fname.' '.$val->mname,
                'position' => $val->position_name,
                'date' => $date,
                'status' => 0
                );

              $this->db->insert('hr_tracking', $col_data);
            }
          }

          $this->db->select('hs_student_tbl.stud_id, hs_student_tbl.fname, hs_student_tbl.mname, hs_student_tbl.lname, hs_student_tbl.user_type, positions_tbl.position_name, positions_tbl.user_type');
          $this->db->from('hs_student_tbl');
          $this->db->join('positions_tbl', 'positions_tbl.user_type = hs_student_tbl.user_type');
          $hs = $this->db->get();

          if ($hs->num_rows() > 0)
          {
            foreach($hs->result() as $val)
            {
              $hs_data = array(
                'user_id' => $val->stud_id,
                'name' => $val->lname.', '.$val->fname.' '.$val->mname,
                'position' => $val->position_name,
                'date' => $date,
                'status' => 0
                );

              $this->db->insert('hr_tracking', $hs_data);
            }
          }

          $this->db->select('employee_tbl.emp_id, employee_tbl.fname, employee_tbl.mname, employee_tbl.lname, employee_tbl.user_type, positions_tbl.position_name, positions_tbl.user_type');
          $this->db->from('employee_tbl');
          $this->db->join('positions_tbl', 'positions_tbl.user_type = employee_tbl.user_type');
          $this->db->where('employee_tbl.user_type <>', 2);
          $this->db->where('employee_tbl.user_type <>', 3);
          $this->db->where('employee_tbl.user_type <>', 4);
          $this->db->where('employee_tbl.user_type <>', 5);
          $this->db->where('employee_tbl.user_type <>', 6);
          $emp = $this->db->get();

          if ($emp->num_rows() > 0)
          {
            foreach($emp->result() as $val)
            {
              $emp_data = array(
                'user_id' => $val->emp_id,
                'name' => $val->lname.', '.$val->fname.' '.$val->mname,
                'position' => $val->position_name,
                'date' => $date,
                'status' => 0
                );

              $this->db->insert('hr_tracking', $emp_data);
            }
          }
        }

        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    public function get_last_active_eval($date = FALSE, $status = FALSE)
    {
      if ($date === FALSE AND $status === FALSE)
      {
        $this->db->select('date');
        $this->db->from('eval_session');
        $this->db->where('is_active', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
          return $query->last_row();
        }
        else
        {
          return FALSE;
        }
      }

      $this->db->where('date', $date);
      $this->db->where('status', $status);
      $query = $this->db->get('hr_tracking');

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }
      else
      {
        return FALSE;
      }
    }

    public function get_eval_progress($status = FALSE)
    {
      if ($status === FALSE)
      {
        $this->db->select('date');
        $this->db->from('eval_session');
        $this->db->where('status', 'started');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
        {
          $result = $query->last_row();

          $this->db->where('date', $result->date);
          $count = $this->db->count_all_results('hr_tracking');

          if ($count > 0)
          {
            return $count;
          }
          else
          {
            return 0;
          }
        }
      }

      $this->db->select('date');
      $this->db->from('eval_session');
      $this->db->where('status', 'started');
      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $result = $query->last_row();

        $this->db->where('status', $status);
        $this->db->where('date', $result->date);

        $count = $this->db->count_all_results('hr_tracking');

        if ($count > 0)
        {
          return $count;
        }
        else
        {
          return 0;
        }
      }
    }
  
    public function get_org_chart($parent)
    {
      $this->db->select('*');
      $this->db->from('org_chart');
      $this->db->where('parent_node',$parent);
    
      $query = $this->db->get();
    
      if($query->num_rows()>0)
      {
        return $query->result();
      
      }
      else
      {
        return false;
      }
    }
  }

// End of file.