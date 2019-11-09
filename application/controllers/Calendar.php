<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

	//indexit võiks ära kustutada ja asendada alumise funtksiooniga. sama tee ka Week.php kontrolleris
	// public function index()
	// {
	// 	$this->load->view('templates/header');
	// 	$this->load->view('pages/calendar');
	// 	$this->load->view('templates/footer');
	// }


	public function view($page = 'calendar') //pääseb ligi: https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/calendar/home
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}
}
