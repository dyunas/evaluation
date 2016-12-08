<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Evaluation_model extends CI_Model
  {
  	public function __construct()
  	{
  		parent::__construct();
  	}

  	public function check_evaluation_status()
  	{
  		$query = $this->db->get('eval_session');

  		if ($query->num_rows() > 0)
  		{
  			$row = $query->last_row();

  			if ($row->is_active == 1)
  			{
  				return $row;
  			}
  			else
  			{
  				$this->session->set_flashdata('error_2', 'You can\'t evaluate right now! Evaluation Time already expired.');
  				return FALSE;
  			}
  		}
      else
      {
        $this->session->set_flashdata('error_2', 'You can\'t evaluate right now! Evaluation Time already expired.');
        return FALSE;
      }
  	}

  	public function get_avlbl_instructor($stud_id, $date)
  	{
  		$this->db->select('*');
  		$this->db->from('tag_validator');
  		$this->db->join('employee_tbl', 'employee_tbl.emp_id = tag_validator.evltee_id');
  		$this->db->where('tag_validator.evltr_id', $stud_id);
      $this->db->where('evltn_dte', $date);

  		$query = $this->db->get();

  		if ($query->num_rows() > 0)
  		{
  			$this->db->select('*');
        $this->db->from('tag_validator');
        $this->db->where('tag_validator.evltr_id', $stud_id);
        $this->db->where('evltn_dte', $date);
        $this->db->where('is_valid', 1);

        $result = $this->db->get();

        if ($result->num_rows() > 0)
        {
          return $query->result();
        }
        else
        {
          $this->db->set('status', 1);
          $this->db->where('user_id', $stud_id);
          $this->db->where('date', $date);

          if ($this->db->update('hr_tracking'))
          {
            $this->session->set_flashdata('error', 'You have successfully evaluated all of your instructors!');
            return $query->result();
          }
        }
  		}
  		else
  		{
  			//$where = array('course' => $course, 'yr_lvl' => $yr_lvl, 'section' => $section);

	  		$this->db->select('*');
	  		$this->db->from('student_subj_tbl');
	  		$this->db->where('stud_id', $stud_id);

	  		$query2 = $this->db->get();

	  		if ($query2->num_rows() > 0)
	  		{
	  			$result = $query2->result();

	  			foreach($result as $item)
	  			{
	  				$data = array(
              'evltn_dte' => $date,
	  					'evltr_id' => $stud_id,
	  					'evltee_id' => $item->emp_id,
              'subject' => $item->subject,
	  					'is_valid' => 1
	  					);

	  				$this->db->insert('tag_validator', $data);
	  			}

	  			$this->db->select('*');
				  $this->db->from('tag_validator');
				  $this->db->join('employee_tbl', 'employee_tbl.emp_id = tag_validator.evltee_id');
				  $this->db->where('tag_validator.evltr_id', $stud_id);
          $this->db->where('evltn_dte', $date);

		  		$query3 = $this->db->get();

				  if($query3->num_rows() > 0)
				  {
				  	return $query3->result();
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
  	}

  	public function get_avlbl_teacher($stud_id, $date)
  	{
      $this->db->select('*');
      $this->db->from('tag_validator');
      $this->db->join('employee_tbl', 'employee_tbl.emp_id = tag_validator.evltee_id');
      $this->db->where('tag_validator.evltr_id', $stud_id);
      $this->db->where('evltn_dte', $date);

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        $this->db->select('*');
        $this->db->from('tag_validator');
        $this->db->where('tag_validator.evltr_id', $stud_id);
        $this->db->where('evltn_dte', $date);
        $this->db->where('is_valid', 1);

        $result = $this->db->get();

        if ($result->num_rows() > 0)
        {
          return $query->result();
        }
        else
        {
          $this->db->set('status', 1);
          $this->db->where('user_id', $stud_id);
          $this->db->where('date', $date);

          if ($this->db->update('hr_tracking'))
          {
            $this->session->set_flashdata('error', 'You have successfully evaluated all of your teachers!');
            return $query->result();
          }
        }
      }
      else
      {
        //$where = array('yr_lvl' => $yr_lvl, 'section' => $section);

        $this->db->select('*');
        $this->db->from('student_subj_tbl');
        $this->db->where('stud_id', $stud_id);

        $query2 = $this->db->get();

        if ($query2->num_rows() > 0)
        {
          $result = $query2->result();

          foreach($result as $item)
          {
            $data = array(
              'evltn_dte' => $date,
              'evltr_id' => $stud_id,
              'evltee_id' => $item->emp_id,
              'subject' => $item->subject,
              'is_valid' => 1
              );

            $this->db->insert('tag_validator', $data);
          }

          $this->db->select('*');
          $this->db->from('tag_validator');
          $this->db->join('employee_tbl', 'employee_tbl.emp_id = tag_validator.evltee_id');
          $this->db->where('tag_validator.evltr_id', $stud_id);
          $this->db->where('evltn_dte', $date);

          $query3 = $this->db->get();

          if($query3->num_rows() > 0)
          {
            return $query3->result();
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
    }

  	public function check_evaluation_tag($id, $subject, $stud_id, $evltn_dte)
  	{
  		$this->db->select('*');
  		$this->db->from('tag_validator');
  		$this->db->where('evltr_id', $stud_id);
      $this->db->where('evltee_id', $id);
      $this->db->where('subject', $subject);
  		$this->db->where('evltn_dte', $evltn_dte);

  		$query = $this->db->get();

  		if ($query->num_rows() > 0)
  		{
  			$row = $query->row();

  			if ($row->is_valid)
  			{
  				return TRUE;
  			}
  			else
  			{
  				$this->session->set_flashdata('error_2', 'Action not allowed!');
  				return FALSE;	
  			}
  		}
  		else
  		{
  			$this->session->set_flashdata('error_2', 'Action not allowed!');
  			return FALSE;	
  		}
  	}

  	public function get_employee_dtls($emp_id)
  	{
  		$this->db->select('*');
  		$this->db->from('employee_tbl');
  		$this->db->where('emp_id', $emp_id);

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

  	public function get_stud_questionnaire()
  	{
  		$this->db->select('*');
  		$this->db->from('stud_questions');

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

    public function get_evaluation_logs($id)
    {
      $this->db->select('*');
      $this->db->from('stud_individual_poll_tbl');
      $this->db->join('employee_tbl', 'employee_tbl.emp_id = stud_individual_poll_tbl.emp_id');
      $this->db->where('stud_individual_poll_tbl.evltr_id', $id);

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

    public function get_evaluation_logs_dtls($id, $subject, $date, $evltr)
    {
      $this->db->select('*');
      $this->db->from('stud_question_poll_tbl');
      $this->db->join('stud_questions', 'stud_questions.id = stud_question_poll_tbl.qstn_id');
      $this->db->where('stud_question_poll_tbl.emp_id', $id);
      $this->db->where('stud_question_poll_tbl.subject', $subject);
      $this->db->where('stud_question_poll_tbl.evltn_dte', $date);
      $this->db->where('stud_question_poll_tbl.evltr_id', $evltr);

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

  	public function insert_stud_evaluation()
  	{
  		$question = $this->get_stud_questionnaire();

        if ($this->session->userdata('user_type') == 15)
        {
          $question = $this->get_stud_questionnaire();

          foreach ($question as $qstn)
          {
            if($qstn->id == $qstn->id)
            {
              $data = array(
                'evltn_dte' => $this->input->post('evltn_dte'),
                'evltr_id' => $this->input->post('evltr_id'),
                'emp_id' => $this->input->post('emp_id'),
                'subject' => $this->input->post('subject'),
                'qstn_id' => $qstn->id,
                'rating' => $this->input->post('box_'.$qstn->id),
                'remarks' => $this->input->post('rem_'.$qstn->id),
                );

              $this->db->insert('stud_question_poll_tbl', $data);
            }
          }

          $data2 = array(
            'evltn_dte' => $this->input->post('evltn_dte'),
            'evltr_id' => $this->input->post('evltr_id'),
            'subject' => $this->input->post('subject'),
            'emp_id' => $this->input->post('emp_id'),
            'user_type' => 15,
            );

          if ($this->db->insert('stud_individual_poll_tbl', $data2))
          {
            $this->db->select('*');
            $this->db->from('stud_col_consolidated_poll_tbl');
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('emp_id', $this->input->post('emp_id'));

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
              $result = $query->result();

              foreach ($result as $row)
              {
                foreach ($question as $qstn)
                {
                  if ($qstn->id == $row->question_id)
                  {
                    if ($this->input->post('box_'.$qstn->id) == 6)
                    {
                      $exlnt = 1;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 5)
                    {
                      $exlnt = 0;
                      $vry_good = 1;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 4)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 1;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 3)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 1;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 2)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 1;
                      $poor = 0;
                    }
                    else
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 1;
                    }

                    $data3 = array(
                      'evltn_dte' => $this->input->post('evltn_dte'),
                      'emp_id' => $this->input->post('emp_id'),
                      'question_id' => $qstn->id,
                      'exlnt' => $row->exlnt + $exlnt,
                      'vry_good' => $row->vry_good + $vry_good,
                      'good' => $row->good + $good,
                      'stsfctry' => $row->stsfctry + $stsfctry,
                      'fair' => $row->fair + $fair,
                      'poor' => $row->poor + $poor,
                      );

                    $this->db->where('emp_id', $this->input->post('emp_id'));
                    $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
                    $this->db->where('question_id', $qstn->id);

                    $this->db->update('stud_col_consolidated_poll_tbl', $data3);
                  }
                }
              }
            }
            else
            {
              foreach ($question as $qstn)
              {
                if($qstn->id == $qstn->id)
                {
                  if ($this->input->post('box_'.$qstn->id) == 6)
                  {
                    $exlnt = 1;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 5)
                  {
                    $exlnt = 0;
                    $vry_good = 1;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 4)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 1;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 3)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 1;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 2)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 1;
                    $poor = 0;
                  }
                  else
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 1;
                  }

                  $data3 = array(
                    'evltn_dte' => $this->input->post('evltn_dte'),
                    'emp_id' => $this->input->post('emp_id'),
                    'question_id' => $qstn->id,
                    'exlnt' => $exlnt,
                    'vry_good' => $vry_good,
                    'good' => $good,
                    'stsfctry' => $stsfctry,
                    'fair' => $fair,
                    'poor' => $poor,
                    );

                  $this->db->insert('stud_col_consolidated_poll_tbl', $data3);
                }
              }
            }

            $this->db->set('is_valid', 0);
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('evltr_id', $this->input->post('evltr_id'));
            $this->db->where('evltee_id', $this->input->post('emp_id'));
            $this->db->where('subject', $this->input->post('subject'));

            $this->db->update('tag_validator');
          }
          
          return TRUE;
        }
        elseif ($this->session->userdata('user_type') == 16)
        {
          $question = $this->get_stud_questionnaire();

          foreach ($question as $qstn)
          {
            if($qstn->id == $qstn->id)
            {
              $data = array(
                'evltn_dte' => $this->input->post('evltn_dte'),
                'evltr_id' => $this->input->post('evltr_id'),
                'emp_id' => $this->input->post('emp_id'),
                'subject' => $this->input->post('subject'),
                'qstn_id' => $qstn->id,
                'rating' => $this->input->post('box_'.$qstn->id),
                'remarks' => $this->input->post('rem_'.$qstn->id),
                );

              $this->db->insert('stud_question_poll_tbl', $data);
            }
          }

          $data2 = array(
            'evltn_dte' => $this->input->post('evltn_dte'),
            'evltr_id' => $this->input->post('evltr_id'),
            'subject' => $this->input->post('subject'),
            'emp_id' => $this->input->post('emp_id'),
            );

          if ($this->db->insert('stud_individual_poll_tbl', $data2))
          {
            $this->db->select('*');
            $this->db->from('stud_col_consolidated_poll_tbl');
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('emp_id', $this->input->post('emp_id'));

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
              $result = $query->result();

              foreach ($result as $row)
              {
                foreach ($question as $qstn)
                {
                  if ($qstn->id == $row->question_id)
                  {
                    if ($this->input->post('box_'.$qstn->id) == 6)
                    {
                      $exlnt = 1;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 5)
                    {
                      $exlnt = 0;
                      $vry_good = 1;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 4)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 1;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 3)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 1;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 2)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 1;
                      $poor = 0;
                    }
                    else
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 1;
                    }

                    $data3 = array(
                      'evltn_dte' => $this->input->post('evltn_dte'),
                      'emp_id' => $this->input->post('emp_id'),
                      'question_id' => $qstn->id,
                      'exlnt' => $row->exlnt + $exlnt,
                      'vry_good' => $row->vry_good + $vry_good,
                      'good' => $row->good + $good,
                      'stsfctry' => $row->stsfctry + $stsfctry,
                      'fair' => $row->fair + $fair,
                      'poor' => $row->poor + $poor,
                      );

                    $this->db->where('emp_id', $this->input->post('emp_id'));
                    $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
                    $this->db->where('question_id', $qstn->id);

                    $this->db->update('stud_col_consolidated_poll_tbl', $data3);
                  }
                }
              }
            }
            else
            {
              foreach ($question as $qstn)
              {
                if($qstn->id == $qstn->id)
                {
                  if ($this->input->post('box_'.$qstn->id) == 6)
                  {
                    $exlnt = 1;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 5)
                  {
                    $exlnt = 0;
                    $vry_good = 1;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 4)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 1;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 3)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 1;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 2)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 1;
                    $poor = 0;
                  }
                  else
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 1;
                  }

                  $data3 = array(
                    'evltn_dte' => $this->input->post('evltn_dte'),
                    'emp_id' => $this->input->post('emp_id'),
                    'question_id' => $qstn->id,
                    'exlnt' => $exlnt,
                    'vry_good' => $vry_good,
                    'good' => $good,
                    'stsfctry' => $stsfctry,
                    'fair' => $fair,
                    'poor' => $poor,
                    );

                  $this->db->insert('stud_col_consolidated_poll_tbl', $data3);
                }
              }
            }

            $this->db->set('is_valid', 0);
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('evltr_id', $this->input->post('evltr_id'));
            $this->db->where('evltee_id', $this->input->post('emp_id'));
            $this->db->where('subject', $this->input->post('subject'));

            $this->db->update('tag_validator');
          }
          
          return TRUE;
        }
        else
        {
          $question = $this->get_stud_questionnaire();

          foreach ($question as $qstn)
          {
            if($qstn->id == $qstn->id)
            {
              $data = array(
                'evltn_dte' => $this->input->post('evltn_dte'),
                'evltr_id' => $this->input->post('evltr_id'),
                'emp_id' => $this->input->post('emp_id'),
                'subject' => $this->input->post('subject'),
                'qstn_id' => $qstn->id,
                'rating' => $this->input->post('box_'.$qstn->id),
                'remarks' => $this->input->post('rem_'.$qstn->id),
                );

              $this->db->insert('stud_question_poll_tbl', $data);
            }
          }

          $data2 = array(
            'evltn_dte' => $this->input->post('evltn_dte'),
            'evltr_id' => $this->input->post('evltr_id'),
            'subject' => $this->input->post('subject'),
            'emp_id' => $this->input->post('emp_id'),
            'user_type' => 15,
            );

          if ($this->db->insert('stud_individual_poll_tbl', $data2))
          {
            $this->db->select('*');
            $this->db->from('stud_elem_consolidated_poll_tbl');
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('emp_id', $this->input->post('emp_id'));

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
              $result = $query->result();

              foreach ($result as $row)
              {
                foreach ($question as $qstn)
                {
                  if ($qstn->id == $row->question_id)
                  {
                    if ($this->input->post('box_'.$qstn->id) == 6)
                    {
                      $exlnt = 1;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 5)
                    {
                      $exlnt = 0;
                      $vry_good = 1;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 4)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 1;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 3)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 1;
                      $fair = 0;
                      $poor = 0;
                    }
                    elseif ($this->input->post('box_'.$qstn->id) == 2)
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 1;
                      $poor = 0;
                    }
                    else
                    {
                      $exlnt = 0;
                      $vry_good = 0;
                      $good = 0;
                      $stsfctry = 0;
                      $fair = 0;
                      $poor = 1;
                    }

                    $data3 = array(
                      'evltn_dte' => $this->input->post('evltn_dte'),
                      'emp_id' => $this->input->post('emp_id'),
                      'question_id' => $qstn->id,
                      'exlnt' => $row->exlnt + $exlnt,
                      'vry_good' => $row->vry_good + $vry_good,
                      'good' => $row->good + $good,
                      'stsfctry' => $row->stsfctry + $stsfctry,
                      'fair' => $row->fair + $fair,
                      'poor' => $row->poor + $poor,
                      );

                    $this->db->where('emp_id', $this->input->post('emp_id'));
                    $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
                    $this->db->where('question_id', $qstn->id);

                    $this->db->update('stud_elem_consolidated_poll_tbl', $data3);
                  }
                }
              }
            }
            else
            {
              foreach ($question as $qstn)
              {
                if($qstn->id == $qstn->id)
                {
                  if ($this->input->post('box_'.$qstn->id) == 6)
                  {
                    $exlnt = 1;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 5)
                  {
                    $exlnt = 0;
                    $vry_good = 1;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 4)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 1;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 3)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 1;
                    $fair = 0;
                    $poor = 0;
                  }
                  elseif ($this->input->post('box_'.$qstn->id) == 2)
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 1;
                    $poor = 0;
                  }
                  else
                  {
                    $exlnt = 0;
                    $vry_good = 0;
                    $good = 0;
                    $stsfctry = 0;
                    $fair = 0;
                    $poor = 1;
                  }

                  $data3 = array(
                    'evltn_dte' => $this->input->post('evltn_dte'),
                    'emp_id' => $this->input->post('emp_id'),
                    'question_id' => $qstn->id,
                    'exlnt' => $exlnt,
                    'vry_good' => $vry_good,
                    'good' => $good,
                    'stsfctry' => $stsfctry,
                    'fair' => $fair,
                    'poor' => $poor,
                    );

                  $this->db->insert('stud_elem_consolidated_poll_tbl', $data3);
                }
              }
            }

            $this->db->set('is_valid', 0);
            $this->db->where('evltn_dte', $this->input->post('evltn_dte'));
            $this->db->where('evltr_id', $this->input->post('evltr_id'));
            $this->db->where('evltee_id', $this->input->post('emp_id'));
            $this->db->where('subject', $this->input->post('subject'));

            $this->db->update('tag_validator');
          }
          
          return TRUE;
        }
  	}
  }

// End of file.