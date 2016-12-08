<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Restore_model extends CI_Model
  {
    public function __construct()
		{
		  parent::__construct();

		  $this->load->database();
		}
 	public function restore_sql($qry){

 		$db = $this->db->query($qry);
 		return $db;
 	}
 }