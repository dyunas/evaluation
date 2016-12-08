$data = array(
  			'stud_id' => $this->input->post('stud_id'),
  			'emp_id' => $this->input->post('emp_id'),
  			'exlnt' => count($this->input->post('five[]')),
  			'abv_avrg' => count($this->input->post('four[]')),
  			'good' => count($this->input->post('three[]')),
  			'stsfctry' => count($this->input->post('two[]')),
  			'unstsfctry' => count($this->input->post('one[]'))
  			);

  		if ($this->db->insert('individual_poll_tbl', $data))
  		{
  			$this->db->select('*');
  			$this->db->from('consolidated_poll_tbl');
  			$this->db->where('emp_id', $this->input->post('emp_id'));

  			$query = $this->db->get();

  			if ($query->num_rows() > 0)
  			{
  				$row = $query->row();

  				$data2 = array(
		  			'exlnt' => ($row->exlnt + count($this->input->post('five[]'))),
		  			'abv_avrg' => ($row->abv_avrg + count($this->input->post('four[]'))),
		  			'good' => ($row->good + count($this->input->post('three[]'))),
		  			'stsfctry' => ($row->stsfctry + count($this->input->post('two[]'))),
		  			'unstsfctry' => ($row->unstsfctry + count($this->input->post('one[]')))
  					);

  				$this->db->where('emp_id', $this->input->post('emp_id'));

  				if ($this->db->update('consolidated_poll_tbl', $data2))
  				{
  					$this->db->set('is_valid', 0);
  					$this->db->where('stud_id', $this->input->post('stud_id'));
  					$this->db->where('emp_id', $this->input->post('emp_id'));
  					$this->db->update('tag_validator');

  					$this->session->set_flashdata('error', 'Evaluation completed!');
  					redirect('/user/evaluate');
  				}
  				else
  				{
  					$this->session->set_flashdata('error', 'Something went wrong while processing evaluation! Please try again.');
  					redirect('/user/evaluate/'.$this->input->post('emp_id'));
  				}
  			}
  			else
  			{
  				$data3 = array(
		  			'emp_id' => $this->input->post('emp_id'),
		  			'exlnt' => count($this->input->post('five[]')),
		  			'abv_avrg' => count($this->input->post('four[]')),
		  			'good' => count($this->input->post('three[]')),
		  			'stsfctry' => count($this->input->post('two[]')),
		  			'unstsfctry' => count($this->input->post('one[]'))
		  			);

  				if ($this->db->insert('consolidated_poll_tbl', $data3))
  				{
  					$this->db->set('is_valid', 0);
  					$this->db->where('stud_id', $this->input->post('stud_id'));
  					$this->db->where('emp_id', $this->input->post('emp_id'));
  					$this->db->update('tag_validator');
  					
  					$this->session->set_flashdata('error', 'Evaluation completed!');
  					redirect('/user/evaluate');
  				}
  				else
  				{
  					$this->session->set_flashdata('error', 'Something went wrong while processing evaluation! Please try again.');
  					redirect('/user/evaluate/'.$this->input->post('emp_id'));
  				}
  			}
  		}
  		else
  		{
  			$this->session->set_flashdata('error', 'Something went wrong while processing evaluation! Please try again.');
  			redirect('/user/evaluate/'.$this->input->post('emp_id'));
  		}