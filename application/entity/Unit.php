<?php

Class Unit{
	public $unit_id;
	public $unit_name;
	public $unit_code;		
	public $unit_type;
	public $c_hours;
	public $s_hours;
	public $a_methods;
	
	function __construct($id, $name, $code, $ut, $c, $s, $amethods){
		$this->unit_id = $id;
		$this->unit_name = $name;
		$this->unit_code = $code;
		$this->c_hours = $c;
		$this->s_hours = $s;				
		$this->unit_type = $ut;
		$this->a_methods = $amethods;
	}
}