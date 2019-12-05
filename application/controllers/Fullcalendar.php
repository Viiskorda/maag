<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Fullcalendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fullcalendar_model');
	}

	function index()
	{
		
		
		$this->load->view('templates/header');
		$this->load->view('pages/fullcalendar');
		$this->load->view('templates/footer');
	}

	function load($roomId)
	{
		$this->input->get('saal', TRUE);
		$event_data = $this->fullcalendar_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		if(	$row['roomID']==$roomId){
			
		{
			$data[] = array(
				'id'	=>	$row['bookingID'],
				'roomID'	=>	$row['roomID'],
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
				 'building'	=>	$row['buildingName'],
				 'bookingID'	=>	$row['bookingID'],
				 'takesPlace'	=>	$row['takes_place'],

			);
		}
	}
		
		echo json_encode($data);
	}

	function insert()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'		=>	$this->input->post('title'),
				'roomID'	=> 	$this->input->post('roomID'),
				'startTime'=>	$this->input->post('start'),
				'endTime'	=>	$this->input->post('end')
			);
			$this->fullcalendar_model->insert_event($data);
		}
	
	}


	public function createfromcalendar()
	{
		if($this->input->post('public_info'))
		{
				$data1 = array(
					'public_info'		=>	$this->input->post('public_info')				
				);
		
				$id= $this->fullcalendar_model->create_booking($data1);


				$insert_data = array();
				
				$insert_data[] = array(
				'roomID'	=> 	$this->input->post('roomID'),
				'startTime'=>	$this->input->post('start'),
				'endTime'	=>	$this->input->post('end'),
				'bookingID' => $id
				);
				

					$this->fullcalendar_model->create_bookingTimes($insert_data);
				
	
	}
	}




	public function create()
	{
		$data['title']='Tee uus broneering';
		$this->load->view('templates/header');
		$this->load->view('pages/booking', $data);
		$this->load->view('templates/footer');
	
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

	function delete()
	{
		if($this->input->post('id'))
		{
			$this->fullcalendar_model->delete_event($this->input->post('id'));
		}
	}

}

?>