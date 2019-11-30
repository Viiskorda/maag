<?php

class Booking_model extends CI_Model
{

public function create_booking(){
$slug=url_title($this->input->post('title'));

$data=array(
	'public_info'=>$this->input->post('clubname'),
	//'slug'=>$slug,
	'c_name' => $this ->input->post('contactPerson'),
	'c_phone' => $this ->input->post('phone'),
	'c_email' => $this ->input->post('email'),
	'comment' => $this ->input->post('additionalComment'),
	//'comment_inner' => $this ->input->post('comment2'),
	'workout' => $this ->input->post('workoutType'),
	//'organizer' => $this ->input->post('phone'),
	//'event_it' => $this ->input->post('phone'),
	//'event_out' => $this ->input->post('phone')
	

);
		return $this->db->insert('bookings', $data);

}


}

?>