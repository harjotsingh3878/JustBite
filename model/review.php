<?php

class Review
{
	private $id;
    private $name;
    private $email;
    private $comment;
    private $rtime;
    private $rday;
    private $food_id;
    
    public function setId($value) {
		$v = trim($value);
		$this->id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getId() {
		return $this->id;
	}
	
    public function setName($value) {
		$v = trim($value);
		$this->name = empty($v) ? null : $v;
		return $this;
	}
 
	public function getName() {
		return $this->name;
	}
	
	public function setEmail($value) {
		$v = trim($value);
		$this->email = empty($v) ? null : $v;
		return $this;
	}
 
	public function getEmail() {
		return $this->email;
	}
	
	public function setComment($value) {
		$v = trim($value);
		$this->comment = empty($v) ? null : $v;
		return $this;
	}
 
	public function getComment() {
		return $this->comment;
	}
	
	public function setRtime($value) {
		$v = trim($value);
		$this->rtime = empty($v) ? null : $v;
		return $this;
	}
 
	public function getRtime() {
		return $this->rtime;
	}
	
	public function setRday($value) {
		$v = trim($value);
		$this->rday = empty($v) ? null : $v;
		return $this;
	}
 
	public function getRday() {
		return $this->rday;
	}
	
	public function setFood_id($value) {
		$v = trim($value);
		$this->food_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFood_id() {
		return $this->food_id;
	}
}

?>