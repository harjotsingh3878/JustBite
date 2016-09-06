<?php

class Order
{
	private $id;
	private $foodname;
    private $foods;
    private $user_id;
    private $total;
    private $dtime;
    
    public function setFoods($value) {
		$v = trim($value);
		$this->foods = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFoods() {
		return $this->foods;
	}
	
	public function setUser_id($value) {
		$v = trim($value);
		$this->user_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getUser_id() {
		return $this->user_id;
	}
	
	public function setTotal($value) {
		$v = trim($value);
		$this->total = empty($v) ? null : $v;
		return $this;
	}
 
	public function getTotal() {
		return $this->total;
	}
	
	public function setId($value) {
		$v = trim($value);
		$this->id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getId() {
		return $this->id;
	}
	
	public function setFoodname($value) {
		$v = trim($value);
		$this->foodname = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFoodname() {
		return $this->foodname;
	}
	
	public function setDtime($value) {
		$v = trim($value);
		$this->dtime = empty($v) ? null : $v;
		return $this;
	}
 
	public function getDtime() {
		return $this->dtime;
	}
}

?>