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
				'id'	=>	$row['id'],
				'roomID'	=>	$row['roomID'],
				'title'	=>	$row['public_info'],
				'start'	=>	$row['startTime'],
				'end'	=>	$row['endTime']
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
				'startTime'=>	$this->input->post('start'),
				'endTime'	=>	$this->input->post('end')
			);
			$this->fullcalendar_model->insert_event($data);
		}
	
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