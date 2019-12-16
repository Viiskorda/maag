<?php
	class Users extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
    
		}
		

		public function registerSelf(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
              
				$this->load->view('templates/header');
				$this->load->view('pages/register', $data);
                $this->load->view('templates/footer');
                
			} else {
				// Encrypt password
              //  $enc_password = md5($this->input->post('password'));
                $enc_password = $this->input->post('password');
				$this->user_model->registerSelfDB($enc_password);
				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
				redirect('fullcalendar?roomId=1');
			}
		}



		// Register user by admin
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
              
				$this->load->view('templates/header');
				$this->load->view('pages/register', $data);
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


		public function registerByAdmin(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
          //  $this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
			if($this->form_validation->run() === FALSE){
              
				$this->load->view('templates/header');
				$this->load->view('pages/register', $data);
                $this->load->view('templates/footer');
                
			} else {
				// Encrypt password
              //  $enc_password = md5($this->input->post('password'));
                $enc_password = $this->input->post('password');
				$this->user_model->register($enc_password);
				// Set message
				$this->session->set_flashdata('user_registered', 'Kasutaja lisatud');
				redirect('manageUsers');
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
               // var_dump($this->user_model->login($email, $password));
				
				// Login user
			
					$email    = $this->input->post('email',TRUE);
					//$password = md5($this->input->post('password',TRUE));
					$password = $this->input->post('password',TRUE);
					$validate = $this->user_model->validate($email,$password);
					if($validate->num_rows() > 0){
						$data  = $validate->row_array();
						$name  = $data['name'];
						$building  = $data['buidingID'];
						$email = $data['email'];
						$roleID = $data['roleID'];
						$sesdata = array(
							'username'  => $name,
							'email'     => $email,
							'building'     => $building,
							'roleID'     => $roleID,
							'session_id' => TRUE
						);
						$this->session->set_userdata($sesdata);
						// access login for admin
						if($roleID === '1'){
							redirect('');
				 
						// access login for staff
						}elseif($roleID === '2'){
							redirect('');
				 
						// access login for author
						}else{
							redirect('');
						}
					
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
			$this->session->sess_destroy();
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
		//	$this->session->sess_destroy();
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

		public function index(){
			$data['title'] = 'Users';
			$data['manageUsers'] = $this->user_model->get_users();
			$this->load->view('templates/header');
			$this->load->view('pages/manageUsers', $data);
			$this->load->view('templates/footer');
		}


		public function delete($id){
			// Check login
		
			$this->user_model->delete_user($id);
			// Set message
			$this->session->set_flashdata('user_deleted', 'Your user has been deleted');
			redirect('manageUsers');
		}





		public function edit($slug){
			// Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }
			$data['manageUsers'] = $this->user_model->get_users();
			$data['post'] = $this->user_model->get_users($slug);
			// Check user
			// if($this->session->userdata('user_id') != $this->post_model->get_users($slug)['user_id']){
			// 	redirect('posts');
			// }
		//	$data['categories'] = $this->user_model->get_categories();
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'Edit Post';
			$this->load->view('templates/header');
			$this->load->view('pages/editUser', $data);
			$this->load->view('templates/footer');
			
		}


		public function update(){
			// Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }
			$this->user_model->update_user();
			// Set message
			$this->session->set_flashdata('post_updated', 'Uuendasid kasutajat');
			redirect('manageUsers');
		}


	}