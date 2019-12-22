<?php
class Pages extends CI_Controller
{
        public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model');
	}

        public function view($page = 'home')
        {
                if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = ucfirst($page); // Capitalize the first letter

               	$roomid=$this->input->get('roomID');
                $data['rooms'] = $this->pages_model->getAllRooms();
                //print_r($data['rooms']);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/' . $page, $data);
                $this->load->view('templates/footer', $data);
        }

        
}
