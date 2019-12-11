<?php
	class User_model extends CI_Model{

		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
               'pw_hash' => $enc_password,
         
			);
			// Insert user
			return $this->db->insert('users', $data);
		}
		// Log user in
		public function login($email, $password){
			// Validate
			$this->db->where('email', $email);
			$this->db->where('pw_hash', $password);
            $result = $this->db->get('users');
         
			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
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
	}