<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php

class Home_model extends CI_Model
{

    public function __construct()
	{
		parent::__construct();
		
    }
    
    Public function get_regions()
	{
		return $this->db->get('regions')->result();
	}
	
}

?>