<?php
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


		public function registerSelfDB($enc_password){
			// User data array
			$data = array(
				'userName' => $this->input->post('name'),
				'email' => $this->input->post('email'),
			
				'userPhone' => $this->input->post('phone'),
			
               'pw_hash' => $enc_password,
         
			);
			// Insert user
			return $this->db->insert('users', $data);
		}





		public function register($enc_password){
			// User data array
			$data = array(
				'userName' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'userPhone' => $this->input->post('phone'),
				'roleID' => $this->input->post('role'),
               'pw_hash' => $enc_password,
         
			);
			// Insert user
			return $this->db->insert('users', $data);
		}
		// Log user in
		function validate($email,$password){
			$this->db->where('email',$email);
			$this->db->where('pw_hash',$password);
			$this->db->join('rooms', 'users.buildingID = rooms.buildingID' , 'left');
			$result = $this->db->get('users',1);
			return $result;
		  }
		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}


		public function get_users($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('users.userName');
			$this->db->join('buildings', 'users.buildingID = buildings.id' , 'left');
			$this->db->join('userRoles', 'users.roleID = userRoles.id' , 'left');
			$query = $this->db->get('users');
			return $query->result_array();
			}
			$this->db->join('buildings', 'users.buildingID = buildings.id' , 'left');
			$this->db->join('userRoles', 'users.roleID = userRoles.id' , 'left');
			$query = $this->db->get_where('users', array('userID' => $slug));
			return $query->row_array();
		
		
		}


		public function delete_user($id){
			$this->db->where('userID', $id);
			$this->db->delete('users');
			return true;
		}


		public function create_category(){
			$data = array(
				'name' => $this->input->post('name'),
				'user_id' => $this->session->userdata('user_id')
			);
			return $this->db->insert('categories', $data);
		}


	
		public function update_user(){
			// $slug = url_title($this->input->post('title'));
			$data = array(
				'userName' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'userPhone' => $this->input->post('phone'),
				'roleID' => $this->input->post('role'),
				'buildingID' => $this->input->post('building'),
			);
			$this->db->where('userID', $this->input->post('id'));
			return $this->db->update('users', $data);
		}





	}