<?php

class Edit_model extends CI_Model
{

   function fetch_all_event(){
		$this->db->order_by('bookingTimes.timeID');
		$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
		$this->db->join('rooms', 'bookingTimes.roomID = rooms.id' , 'left');
		$this->db->join('buildings', 'rooms.buildingID = buildings.id' , 'left');
		$this->db->join('bookingTypes', 'bookings.typeID = bookingTypes.id' , 'left');
		return $this->db->get('bookingTimes');
	}


	function update(){
	


	}



}

?>