<?php

class User
{
    private $fullname;
    private $username;
    private $email;
    private $password;
    private $phone;
    private $confirm;
    private $newpass;
    private $size;
    
    public function setFullname($value) {
		$v = trim($value);
		$this->fullname = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFullname() {
		return $this->fullname;
	}
	
	public function setUsername($value) {
		$v = trim($value);
		$this->username = empty($v) ? null : $v;
		return $this;
	}
 
	public function getUsername() {
		return $this->username;
	}
	
	public function setEmail($value) {
		$v = trim($value);
		$this->email = empty($v) ? null : $v;
		return $this;
	}
 
	public function getEmail() {
		return $this->email;
	}
	
	public function setPassword($value) {
		$v = trim($value);
		$this->password = empty($v) ? null : $v;
		return $this;
	}
 
	public function getPassword() {
		return $this->password;
	}
	
	public function setPhone($value) {
		$v = trim($value);
		$this->phone = empty($v) ? null : $v;
		return $this;
	}
 
	public function getPhone() {
		return $this->phone;
	}
	
	public function setConfirm($value) {
		$v = trim($value);
		$this->confirm = empty($v) ? null : $v;
		return $this;
	}
 
	public function getConfirm() {
		return $this->confirm;
	}
	
	public function setNewpass($value) {
		$v = trim($value);
		$this->newpass = empty($v) ? null : $v;
		return $this;
	}
 
	public function getNewpass() {
		return $this->newpass;
	}
	
	public function setSize($value) {
		$v = trim($value);
		$this->size = empty($v) ? null : $v;
		return $this;
	}
 
	public function getSize() {
		return $this->size;
	}

}

?>