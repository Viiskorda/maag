<?php

class Fullcalendar_model extends CI_Model
{
	function fetch_all_event(){
		$this->db->order_by('bookingTimes.id');
		$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id');
		return $this->db->get('bookingTimes');
	}

	function insert_event($data)
	{
		
		$this->db->insert('bookingTimes', $data);
		$fk_sales_id = $this->db->insert_id();



		
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