<?php

class Fullcalendar_model extends CI_Model
{
	function fetch_all_event(){
		// $this->db->select('bookings.id',	'bookings.typeID',	'bookings.public_info',	'bookings.c_name',	'bookings.c_phone',	
		// 'bookings.c_email',	'bookings.comment',	'bookings.comment_inner',	'bookings.organizer',	'bookings.workout',	
		// 'bookings.event_in',	'bookings.event_out',	'bookings.created_at', 'bookingTimes.id',	'bookingTimes.bookingID',	
		// 'bookingTimes.roomID',	'bookingTimes.approved',	'bookingTimes.takes_place',	'bookingTimes.title',	'bookingTimes.startTime',	
		// 'bookingTimes.endTime', 'buildings.id',	'buildings.regionID',	'buildings.name',	'buildings.phone',	'buildings.contact_email',
		// 'buildings.notify_email',	'buildings.price_url', 'rooms.id',	'rooms.buildingID',	'rooms.buildingName');
	//	$this->db->from(" buildings");
		$this->db->order_by('bookingTimes.timeID');
		$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
		$this->db->join('rooms', 'bookingTimes.roomID = rooms.id' , 'left');
		$this->db->join('buildings', 'rooms.buildingID = buildings.id' , 'left');
		return $this->db->get('bookingTimes');
	}

	function insert_event($data)
	{
		
		$this->db->insert('bookingTimes', $data);
		$fk_sales_id = $this->db->insert_id();
		
	}

	public function create_booking($data1){


		$this->db->insert('bookings', $data1);
		return $this->db->insert_id();
	
	}
	
	public function create_bookingTimes($insert_data){
			
		//	$this->db->insert('bookingTimes', $data2);
			$this->db->insert_batch('bookingTimes', $insert_data);
			return $this->db->insert_id();
	}



	function update_event($data, $id)
	{
		$this->db->where('timeID', $id);
		$this->db->update('bookingTimes', $data);
	}

	function delete_event($id)
	{
		$this->db->where('timeID', $id);
		$this->db->delete('bookingTimes');
	}



}

?>