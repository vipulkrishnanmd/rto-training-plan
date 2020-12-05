<?php

class TrainingPlan{
	public $offering_id;
	public $tp_name; 
	public $course_id;
	public $campus_id;
	public $start_date;
	public $end_date;
	public $time;
	public $strength;
	public $training_method;
	
	
	function __construct($offering_id,$tp_name,$course_id,$campus_id,$start_date,$end_date,$time,$strength,$training_method){
		$this->offering_id = $offering_id;
		$this->tp_name = $tp_name;
		$this->course_id = $course_id;
		$this->campus_id = $campus_id;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->time = $time;
		$this->strength = $strength;
		$this->training_method = $training_method;
	}
}