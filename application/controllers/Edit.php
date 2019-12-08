<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('edit_model');
    }

   

	function load($bookingID)
	{
	//	$this->input->get('saal', TRUE);
		$event_data = $this->edit_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		if(	$row['bookingID']==$bookingID){
			
		{
			$data[] = array(
				'id'	=>	$row['bookingID'],
				'roomID'	=>	$row['roomID'],
				'timeID'=>	$row['timeID'],
				'title'	=>	$row['public_info'],
				'start'	=>	$row['startTime'],
				'end'	=>	$row['endTime'],
				'event_in'	=>	$row['event_in'],
				'event_out'	=>	$row['event_out'],
				'clubname'	=>	$row['c_name'],
				'phone'	=>	$row['c_phone'],
				'email'	=>	$row['c_email'],
				'workout'	=>	$row['workout'],
				'created_at'	=>	$row['created_at'],
				 'selectedroom'	=>	$row['name'],
				 'building'	=>	$row['name'],
				 'roomName'	=>	$row['roomName'],
				 'bookingID'	=>	$row['bookingID'],
				 'takesPlace'	=>	$row['takes_place'],
				 'approved'	=>	$row['approved'],
				 'organizer'	=>	$row['organizer'],

				);
			}
		}
			
			echo json_encode($data);
	}
	
	function loadAllRoomBookingTimes($roomId)
	{
		$this->input->get('saal', TRUE);
		$event_data = $this->edit_model->fetch_all_Booking_times();
		foreach($event_data->result_array() as $row)
		if(	$row['roomID']==$roomId){
			
		{
			$data[] = array(
				'id'	=>	$row['bookingID'],
				//'building'=>	$row['building'],
				'timeID'=>	$row['timeID'],
				'title'	=>	$row['public_info'],
				'start'	=>	$row['startTime'],
				'end'	=>	$row['endTime'],
				);
		}
	}
		
		echo json_encode($data);
	}
    

	function updateprevtodelete()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'startTime'	=>	$this->input->post('start'),
				'endTime'		=>	$this->input->post('end')
			);

			$this->edit_model->update_event($data, $this->input->post('id'));
		}
	}


	public function update()
	{	
		// if($this->input->post('BookingID'))
		// {
			$data1 = array(
				'public_info'=>$this->input->post('publicInfo'),
				'c_name' => $this ->input->post('contactPerson'),
				'organizer' => $this ->input->post('organizer'),
				'c_phone' => $this ->input->post('phone'),
				'c_email' => $this ->input->post('email'),
				
				//'building' => $this ->input->post('building'), //pole seda formis
				
				'workout' => $this ->input->post('workoutType'),
				// 'event_in' => $this ->input->post('eventIn'),
				// 'event_out' => $this ->input->post('phone')
			);
			
			//$this->form_validation->set_rules('clubname', 'Klubi nimi', 'required');
		//	$this->form_validation->set_rules('contactPerson', 'Kontaktisik', 'required');
	
				$this->edit_model->update_booking($data1, $this->input->post('BookingID'));
				
			
	
					$insert_data = array();
					$start_data = $this->input->post('bookingtimesFrom');
					$end_data = $this->input->post('bookingtimesTo');
					
	
					for($i = 0; $i < count($start_data); $i++)
					{
					
					$insert_data[] = array(
					//'roomID' => $this->input->post('sportrooms'),
					'startTime' => $start_data[$i], 
					'endTime' => $end_data[$i],
					
					);
					$this->edit_model->update_bookingTimes($insert_data[$i], $this->input->post('timesIdArray')[$i]);
				}
				//var_dump($insert_data);
			//	$this->edit_model->update_bookingTimes($insert_data, $this->input->post('timesIdArray'));
						//$this->booking_model->create_bookingTimes($insert_data);
					//	$this->load->view('booking/success');
					//	redirect('fullcalendar?roomId=1');
				
					//var_dump($data1);

		// }
		


		if($this->form_validation->run()===FALSE){
			
				redirect(base_url('fullcalendar?roomId=1'));
					$this->load->view('templates/header');
					$this->load->view('pages/fullcalendar?roomId=1');//see leht laeb vajalikku vaadet. ehk saab teha controllerit ka mujale, mis laeb õiget lehte
					echo "success!";
					$this->load->view('templates/footer');


		}else{
		//	$this->booking_model->create_booking();
			$this->load->view('fullcalendar?roomId=1');//redirectib sinna peale väljade korrektselt sisestamist
		}

	
	}

	






}

?>