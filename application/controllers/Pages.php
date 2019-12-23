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
                $roomid=$this->input->get('roomId');
                $data['rooms'] = $this->pages_model->getAllRooms($roomid);
                $data['sportPlaces'] = $this->pages_model->getAllBuildings();
                $data['sportPlacesToChoose'] = $this->pages_model->getAllBuildingRooms();
                $data['allBookingInfo'] = $this->pages_model->getAllBookings();
               
                foreach ( $data['sportPlacesToChoose'] as $each) {
                        if(($each->buildingID!=$this->session->userdata('building')&&$this->input->get('roomId')==$each->id&&($this->session->userdata('roleID')==='2' or $this->session->userdata('roleID')==='3'))){
                             
                        //        echo  $this->input->get('roomId');
                        //         var_dump( $each->id);
                        $this->session->set_flashdata('access_deniedToUrl', 'Kahjuks teil puuduvad õigused selle saali redigeerimiseks. Saali seisu vaatamiseks peate välja logima või avama teise veebilehitsejaga');
                        redirect('');
                        };
                };
               
                $data['regions'] = $this->pages_model->getAllRegions();
                //print_r($data['rooms']);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/' . $page, $data);
                $this->load->view('templates/footer', $data);
        }

        
}
