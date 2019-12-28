<?php
	class Building_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_building($slug = FALSE){
			if($slug === FALSE){
			$this->db->order_by('buildings.id');
			//$this->db->join('rooms', ' buildings.id = rooms.buildingID' , 'left');
			
			$query = $this->db->get('buildings');
			return $query->result_array();
			}
			$this->db->join('rooms', ' buildings.id = rooms.buildingID' , 'left');
			$query = $this->db->get_where('buildings', array('buildings.id' => $slug));
			return $query->result_array();
		
		}


		public function get_rooms(){
		
			$this->db->order_by('buildingID');
			
			$query = $this->db->get('rooms');
			return $query->result_array();
				
		
		}


		public function delete_building($id){
			$this->db->where('id', $id);
			$this->db->delete('buildings');
			return true;
		}

		public function delete_room($id){
			$this->db->where('id', $id);
			$this->db->delete('rooms');
			return true;
		}


		public function create_category(){
			$data = array(
				'name' => $this->input->post('name'),
				'building_id' => $this->session->buildingdata('building_id')
			);
			return $this->db->insert('categories', $data);
		}



		public function registerBuilding(){
		
			$data = array(
				'name' => $this->input->post('name'),
				'contact_email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'notify_email' => $this->input->post('notifyEmail'),
				'price_url' => $this->input->post('price_url'),				
			);
		
			return $this->db->insert('buildings', $data);
		}




	
		public function update_building(){
			// $slug = url_title($this->input->post('title'));
			$data = array(
				'name' => $this->input->post('building'),
				'contact_email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'notify_email' => $this->input->post('notifyEmail'),
				
			);
			$this->db->where('id', $this->input->post('id'));

			$data2 = array(
				'name' => $this->input->post('building'),
				'contact_email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'notify_email' => $this->input->post('notifyEmail'),
				
			);

			return $this->db->update('buildings', $data);
		}




		public function createNewRoom(){
			
				$data = array(
					'roomName' => $this->input->post('roomName'),
					'buildingID' =>$this->input->post('id'),
					'activeRoom' => $this->input->post('status'),
			   );
		
			
			// Insert room
			return $this->db->insert('rooms', $data);
		
		}


	}