<?php

class Cart
{
	private $id;
    private $user_id;
    private $food_id;
    private $quantity;
    private $food;
    private $price;
    
    public function setUser_id($value) {
		$v = trim($value);
		$this->user_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getUser_id() {
		return $this->user_id;
	}
	
	public function setFood_id($value) {
		$v = trim($value);
		$this->food_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFood_id() {
		return $this->food_id;
	}
	
	public function setQuantity($value) {
		$v = trim($value);
		$this->quantity = empty($v) ? null : $v;
		return $this;
	}
 
	public function getQuantity() {
		return $this->quantity;
	}
	
	public function setId($value) {
		$v = trim($value);
		$this->id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getId() {
		return $this->id;
	}
	
	public function setFood($value) {
		$v = trim($value);
		$this->food = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFood() {
		return $this->food;
	}
	
	public function setPrice($value) {
		$v = trim($value);
		$this->price = empty($v) ? null : $v;
		return $this;
	}
 
	public function getPrice() {
		return $this->price;
	}
}

?>