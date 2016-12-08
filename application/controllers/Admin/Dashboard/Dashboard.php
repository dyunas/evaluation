<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Records/Employee/Employee_model');
  	  $this->load->model('Admin/Settings/Positions_model','positions');
  	  $this->load->model('Admin/Settings/Department_model','department');
    }

    public function Index()
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
			    $data = array(
		  			'head_node'=> $this->get_head(),
						'generated' =>$this->generate_org_chart()
					);
          $data['title'] = 'Dashboard';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['progress'] = $this->Dashboard_model->get_eval_progress(1);
          $data['total'] = $this->Dashboard_model->get_eval_progress();
          $data['date'] = $this->Dashboard_model->get_last_active_eval();
          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Dashboard/index');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Evaluation_status($id)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          if($this->Dashboard_model->set_eval_status($id))
          {
            redirect('/admin_panel/dashboard');
          }
          else
          {
            echo 'Error!';
          }
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function Evaluation_progress($date)
    {
      if ($this->session->userdata('is_in'))
      {
        if ($this->session->userdata('user_type') != 1)
        {
          redirect('/user/login');
        }
        else
        {
          $data['title'] = 'Progress Overview';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          $data['done'] = $this->Dashboard_model->get_last_active_eval($date, 1);
          $data['not_done'] = $this->Dashboard_model->get_last_active_eval($date, 0);
          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Dashboard/Progress');
        }
      }
      else
      {
        redirect('/admin');
      }
    }

    public function generate_org_chart()
    {
      $result = "";
		  $getRoot = $this->Employee_model->get_employee_by_position(2);
        
        if ($getRoot)
        {
          $root_id = $getRoot->id;
          $get_root = $this->Employee_model->get_root_employee($root_id);
          
          if(!$get_root)
          {
            echo $result;
          }
          else
          {
            $result ="<ul>";
            $fname = $get_root->fname;
            $lname = $get_root->lname;
            $post = $get_root->position_name;
            $result .="<li>$fname, $lname <br/> <b>$post</b>";
            $result .= $this->get_tree($root_id);
            $result .= "</li>";
            $result .= "</ul>";
          }

          return $result;
        }

      return $result;
    }

    public function get_head()
    {
      $res = "";
      $get_emp = $this->Employee_model->get_employee_tbl();

      if ($get_emp)
      {
        foreach ($get_emp as $emp)
        {
          $id = $emp->id;
          $lname = $emp->lname;
          $fname = $emp->fname;
          $post = $emp->position_name;
          $res .= "<option value=\"$id\">$lname, $fname - $post</option>";
        }
        
        return $res;
      }
      else
      {
        $res = '<option value="">Table empty!</option>';
        return $res;
      }
    }

    public function getListItem()
    {
      
      $id = $this->input->get('empNot');
      $getNotIn = array($id,'1');
      $empSql = $this->Employee_model->get_employee($getNotIn);
      $res = "";
      
      if ($empSql)
      {
        foreach ($empSql as $emp)
        {
          $res .= "<tr>
          <td><input type='checkbox' class='child_node' value='".$emp->id."'/>".$emp->lname.", ".$emp->fname."</td>
          <td>".$emp->position_name."</td>
          </tr>";
        }

        echo $res;
      }
      else
      {
        echo 'Table empty!';
      }
    }

    public function get_tree($id)
    {
      $result = "";
      $tree = $this->Dashboard_model->get_org_chart($id);
      if(!$tree)
      {
        echo $result;
      }
      else
      {
        $result = "<ul>";
        foreach ($tree as $branch)
        {
          $child = $branch->child_node;
          $empSql = $this->Employee_model->get_root_employee($child);
        
          if(!$empSql)
          {
            //
          }
          else
          {
            $ln = $empSql->lname;
            $fn = $empSql->fname;
            $post = $empSql->position_name;
            $dept = $empSql->department;
          }

          $result .= "<li>$dept <a class='link-sys' onclick=\"testFunction('$child')\"><i class='fa fa-remove fa-xs'></i></a> <br/>$fn, $ln <br/> <b>$post</b>";
          $result .= $this->get_tree($child);
          $result .="</li>";
        }
      
        $result .="</ul>";
      }

      return $result;
    }
	
    public function appoint_child()
    {
      $cm1 = $this->input->get('cm_head');
      $cm2 = $this->input->get('cm_child');
      $data = array('parent_node'=>$cm1,'child_node'=>$cm2);
      $appointChild = $this->Employee_model->insertOrg($data);
    }
	
  	public function removeBranch()
    {
  		$child = $this->input->get('child');
  		$removeSql = $this->Employee_model->removeOrg($child);
  		if($removeSql)
      {
  			echo 1;
  		}
      else
      {
  			echo 0;
  		}
  	}
  }

// End of file.