<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Department_model extends CI_Model
 {
   public function __construct()
   {
     parent::__construct();
   }

   public function get_department_tbl()
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

   public function get_department_dtl($id)
   {
     $this->db->select('*');
     $this->db->from('department_tbl');
     $this->db->where('id', $id);

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

   public function insert_new_department()
   {
     $data = array('dprtmnt_name' => $this->input->post('department'));

     if ($this->db->insert('department_tbl', $data))
     {
       $this->session->set_flashdata('error', 'New department added!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while adding new department! Please try again.');
       return FALSE;
     }
   }

   public function update_department()
   {
     $data = array('dprtmnt_name' => $this->input->post('department'));

     $this->db->where('id', $this->input->post('id'));

     if ($this->db->update('department_tbl', $data))
     {
       $this->session->set_flashdata('error', 'department updated!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while updating department! Please try again.');
       return FALSE;
     }
   }

   public function delete_department($id)
   {
     $this->db->where('id', $id);

     if ($this->db->delete('department_tbl'))
     {
       $this->session->set_flashdata('error', 'department deleted!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while deleting department! Please try again.');
       return FALSE;
     }
   }
 }

// End of file.