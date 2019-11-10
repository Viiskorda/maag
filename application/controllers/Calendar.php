<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendar_model');
	}


	public function view($page = 'calendar') //pääseb ligi: https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/calendar/home
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$data['regions'] = $this->calendar_model->getAllRegions();
		$data['buildings'] = $this->calendar_model->getAllBuildings();
		$data['rooms'] = $this->calendar_model->getAllRooms();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}

	function fetch_state()
	{
	 if($this->input->post('country_id'))
	 {
	  echo $this->calendar_model->fetch_state($this->input->post('country_id'));
	 }
	}


	function fetch_city()
	{
	 if($this->input->post('state_id'))
	 {
	  echo $this->calendar_model->fetch_city($this->input->post('state_id'));
	 }
	}
}
