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
	

		$this->form_validation->set_rules('clubname', 'Klubi nimi', 'required');
		$this->form_validation->set_rules('contactPerson', 'Kontaktisik', 'required');

		if($this->form_validation->run()===FALSE){
			
					$this->load->view('templates/header');
					$this->load->view('pages/booking', $data);//see leht laeb vajalikku vaadet. ehk saab teha controllerit ka mujale, mis laeb õiget lehte
					$this->load->view('templates/footer');


		}else{
			$this->booking_model->create_booking();
			$this->load->view('booking/success');//redirectib sinna peale väljade sisestamist
		}

	
	}


}

?>