<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('edit_model');
    }

    function index()
	{
		
		$this->load->view('templates/header');
       $this->load->view('pages/edit');
      
		$this->load->view('templates/footer');
	}

	function load()
	{
		$this->input->get('saal', TRUE);
		$event_data = $this->fullcalendar_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		
			
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

			);
		}
	
		
		echo json_encode($data);
	}

    
    

	function update()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'startTime'	=>	$this->input->post('start'),
				'endTime'		=>	$this->input->post('end')
			);

			$this->fullcalendar_model->update_event($data, $this->input->post('id'));
		}
	}

	


}

?>