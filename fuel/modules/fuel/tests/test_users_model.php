<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Test_users_model extends MY_Model {

	public $required = array('email');
	public $friendly_name = 'Users';
	public $singular_name = 'User';
	public $has_many = array('roles' => array(FUEL_FOLDER => 'categories'));
	
	public function __construct()
	{
		parent::__construct('users');
	}
	
	public function _common_query()
	{
		$this->db->select('users.*, CONCAT(first_name, " ", last_name) as full_name', FALSE);
	}
}


class Test_user_model extends Data_record {

	public $full_name;
	
	public function get_full_name($title = '')
	{
		$full_name = $this->first_name.' '.$this->last_name;
		if (!empty($title)) $full_name = $title.' '.$full_name;
		return $full_name;
	}
	
	
}
