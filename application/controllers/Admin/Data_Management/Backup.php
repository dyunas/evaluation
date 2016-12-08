<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Backup extends CI_Controller
  {
  	public function __construct()
  	{
  	  parent::__construct();
      $this->load->dbutil();
      $this->load->helper('download');
      $this->load->model('Admin/Dashboard/Dashboard_model');
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
          $data['title'] = 'Backup Files';
          $data['acc_dtls'] = $this->Dashboard_model->get_acct_details();
          
          $this->load->view('template/temp_head', $data);
          $this->load->view('Admin/Data_management/Backup/Index');
        }
      }
    }
    public function backup_database(){
      $db = date('Y-m-d');
      $prefs = array(
        'ignore'      => array(),
        'format'      => 'zip',    
        'filename'    => 'mybackup.sql'
        );
      $backup =& $this->dbutil->backup($prefs); 
      force_download($db.'_evalution.gz', $backup);
    }
    

  }