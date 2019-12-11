<?php
	class Users extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
    
        }

		// Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
              
				$this->load->view('templates/header');
				$this->load->view('register', $data);
                $this->load->view('templates/footer');
                
			} else {
				// Encrypt password
              //  $enc_password = md5($this->input->post('password'));
                $enc_password = $this->input->post('password');
				$this->user_model->register($enc_password);
				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
				redirect('fullcalendar?roomId=1');
			}
		}
		// Log in user
		public function login(){
            $data['title'] = 'Sign In';
           
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
             
				$this->load->view('templates/header');
				$this->load->view('login', $data);
				$this->load->view('templates/footer');
			} else {
             
				// Get email
				$email = $this->input->post('email');
				// Get and encrypt the password
               // $password = md5($this->input->post('password'));
                $password = $this->input->post('password');
                var_dump($this->user_model->login($email, $password));
               
				// Login user
				$user_id = $this->user_model->login($email, $password);
				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
                        'email' => $email,
                     
						'session_id' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect('fullcalendar?roomId=1');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('login');
				}		
			}
		}
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('session_id');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('');
		}
		// Check if email exists
		
		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}