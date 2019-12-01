<?php

class Booking_model extends CI_Model
{

public function create_booking($data1){


	$this->db->insert('bookings', $data1);
	return $this->db->insert_id();

}

public function create_bookingTimes($data2){
		
		$this->db->insert('bookingTimes', $data2);
		return $this->db->insert_id();
	}

public function getAllRooms()
{
	
	$this->db->order_by('id');
	$query = $this->db->get('rooms');
	return $query->result();
}


}

?>