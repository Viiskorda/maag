<?php

class Fullcalendar_model extends CI_Model
{
	function fetch_all_event(){
		$this->db->order_by('bookingTimes.id');
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
		$this->db->where('id', $id);
		$this->db->update('bookingTimes', $data);
	}

	function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('bookingTimes');
	}



}

?>