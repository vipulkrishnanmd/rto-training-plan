<?php
class Campus{
	public $campus_id;
	public $campus_name;
	public $campus_address;
	
	function __construct($id,$name,$address){
		$this->campus_id = $id;
		$this->campus_name = $name;
		$this->campus_address = $address;
	}
} 