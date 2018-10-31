<?php

class User{

	private $dept_no;
	private $dept_name;

	public function __get($key){
		return $this->$key;
	}

	public function __set($key,$value){
		$this->$key=$value;
	}

}

?>
