<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
	}

	public function create()
	{
		$data['title']='Tee uus broneering';
		$data['rooms'] = $this->booking_model->getAllRooms();
		$data['buildings'] = $this->booking_model->getAllBuildings();

		$data1 = array(
			'public_info'=>$this->input->post('clubname'),
			//'slug'=>$slug,
			'c_name' => $this ->input->post('contactPerson'),
			'c_phone' => $this ->input->post('phone'),
			'c_email' => $this ->input->post('email'),
			'comment' => $this ->input->post('additionalComment'),
			'comment_inner' => $this ->input->post('comment2'),
			'workout' => $this ->input->post('workoutType'),
			//'organizer' => $this ->input->post('phone'),
			//'event_it' => $this ->input->post('phone'),
			//'event_out' => $this ->input->post('phone')
		);
		
		$this->form_validation->set_rules('clubname', 'Klubi nimi', 'required');
	//	$this->form_validation->set_rules('contactPerson', 'Kontaktisik', 'required');

		if ($this->form_validation->run() != FALSE)
				{
				   $id= $this->booking_model->create_booking($data1);


					$data2 = array(
					'roomID' => $this->input->post('sportrooms'),
					'startTime' => $this->input->post('mytext[1]'),
					'endTime' => $this->input->post('begin[1]'),
	
					'bookingID' => $id
				);

				$insert_data = array();
				$start_data = $this->input->post('mytext');
				$end_data = $this->input->post('begin');

				for($i = 1; $i <= count($start_data); $i++)
				{
				$insert_data[] = array(
				'roomID' => $this->input->post('sportrooms'),
				'startTime' => $start_data[$i], 
				'endTime' => $end_data[$i],
				'bookingID' => $id
				);
				}

					$this->booking_model->create_bookingTimes($insert_data);
				//	$this->load->view('booking/success');
					redirect('fullcalendar?roomId=1');
		}



		if($this->form_validation->run()===FALSE){
			
					$this->load->view('templates/header');
					$this->load->view('pages/booking', $data);//see leht laeb vajalikku vaadet. ehk saab teha controllerit ka mujale, mis laeb õiget lehte
					$this->load->view('templates/footer');


		}else{
			$this->booking_model->create_booking();
			$this->load->view('fullcalendar?roomId=1');//redirectib sinna peale väljade korrektselt sisestamist
		}

	
	}


}

?>