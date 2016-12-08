<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Restore extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      //$this->load->dbutil();
      $this->load->helper('download');
      //$this->load->library('upload');
      $this->load->model('Admin/Dashboard/Dashboard_model');
      $this->load->model('Admin/Data_management/Restore_model','restore');
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
          $data['title'] = 'Restore Files';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          
          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Data_management/Restore/Index');
        }
      }
    }

    public function Restore_database(){
      $host = "localhost";
      $user = "root";
      $password = "";
      $dbname = "evaluation";

      $config['upload_path'] = 'assets/uploads/db_back/';
      $config['file_name'] = 'db1.sql';
      $config['overwrite'] = true;
      $config['allowed_types'] = '*';

      $this->load->library('upload', $config);
      if($this->upload->do_upload('dbs')){
      $dbs = 'assets/uploads/db_back/db1.sql';
      $templine = '';
$lines = file($dbs);
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
    $rdb = $this->restore->restore_sql($templine);

    $templine = '';
  }
}
 $error = "Database Table restored!";
 $this->session->set_flashdata('restore_message', $error);   
 
      }else{
        $error = array('error' => $this->upload->display_errors());
         $this->session->set_flashdata('restore_message', $error);
      }
     
      
      redirect('Admin/Data_Management/Restore','refresh');
    }
    

  }