<?php

Class UnitOffering{
	public $unit_offering_id;
	public $unit;
	public $course;
	
	function __construct($id,$unit,$course){
		$this -> unit_offering_id = $id;
		$this -> unit = $unit;
		$this -> course = $course;
	}
}

