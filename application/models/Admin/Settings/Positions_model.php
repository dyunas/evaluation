<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Positions_model extends CI_Model
 {
   public function __construct()
   {
     parent::__construct();
   }

   public function get_positions_tbl()
   {
     $this->db->select('*');
     $this->db->from('positions_tbl');

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

   public function get_position_dtl($id)
   {
     $this->db->select('*');
     $this->db->from('positions_tbl');
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

   public function insert_new_position()
   {
     $data = array(
      'position_name' => $this->input->post('position'),
      'user_type' => $this->input->post('user_type')
      );

     if ($this->db->insert('positions_tbl', $data))
     {
       $this->session->set_flashdata('error', 'New position added!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while adding new position! Please try again.');
       return FALSE;
     }
   }

   public function update_position()
   {
     $data = array('position_name' => $this->input->post('position'));

     $this->db->where('id', $this->input->post('id'));

     if ($this->db->update('positions_tbl', $data))
     {
       $this->session->set_flashdata('error', 'Position updated!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while updating position! Please try again.');
       return FALSE;
     }
   }

   public function delete_position($id)
   {
     $this->db->where('id', $id);

     if ($this->db->delete('positions_tbl'))
     {
       $this->session->set_flashdata('error', 'Position deleted!');
       return TRUE;
     }
     else
     {
       $this->session->set_flashdata('error', 'Something went wrong while deleting position! Please try again.');
       return FALSE;
     }
   }
 }

// End of file.