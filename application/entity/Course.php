<?php

class Course{
	public $course_id;
	public $course_name;
	public $course_code;		
	public $wp;
	public $sup_hours;
	
	function __construct($id,$name,$code, $work, $sup_hourz){
		$this -> course_id = $id;
		$this -> course_name = $name;
		$this -> course_code = $code;				
		$this -> wp = $work;
		$this -> sup_hours = $sup_hourz;
	}
}