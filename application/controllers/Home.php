<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}


	public function view($page = 'home') //pääseb ligi: https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/calendar/home
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$data['regions'] = $this->home_model->getAllRegions();
		$data['buildings'] = $this->home_model->getAllBuildings();
		$data['rooms'] = $this->home_model->getAllRooms();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);

		// $logged = false;
	}

	function fetch_city()
	{
	 if($this->input->post('country_id'))
	 {
	  echo $this->home_model->fetch_city($this->input->post('country_id'));
	 }
	}


	function fetch_building()
	{
	 if($this->input->post('state_id'))
	 {
	  echo $this->home_model->fetch_building($this->input->post('state_id'));
	 }
	}
}
