<?php
	class Building_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_building($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('buildings.buildingName');
			$this->db->join('buildings', 'buildings.buildingID = buildings.id' , 'left');
			$this->db->join('buildingRoles', 'buildings.roleID = buildingRoles.id' , 'left');
			$query = $this->db->get('buildings');
			return $query->result_array();
			}
			$this->db->join('rooms', ' buildings.id = rooms.buildingID' , 'left');
			$query = $this->db->get_where('buildings', array('.buildings.id' => $slug));
			return $query->result_array();
		
		
		}


		public function delete_building($id){
			$this->db->where('buildingID', $id);
			$this->db->delete('buildings');
			return true;
		}


		public function create_category(){
			$data = array(
				'name' => $this->input->post('name'),
				'building_id' => $this->session->buildingdata('building_id')
			);
			return $this->db->insert('categories', $data);
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
			return $this->db->update('buildings', $data);
		}




		public function createNewRoom(){

			$data = array(
				'roomName' => $this->input->post('roomName'),
				'buildingID' => $this->input->post('id'),
		   );
			// Insert room
			return $this->db->insert('rooms', $data);
		}



	}