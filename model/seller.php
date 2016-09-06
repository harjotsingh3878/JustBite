<?php

class Seller
{
	private $id;
    private $company;
    private $address;
    private $city;
    private $postalcode;
    private $description;
    private $logo;
    private $user_id;
    
    public function setId($value) {
		$v = trim($value);
		$this->id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getId() {
		return $this->id;
	}
    
    public function setCompany($value) {
		$v = trim($value);
		$this->company = empty($v) ? null : $v;
		return $this;
	}
 
	public function getCompany() {
		return $this->company;
	}
	
	public function setAddress($value) {
		$v = trim($value);
		$this->address = empty($v) ? null : $v;
		return $this;
	}
 
	public function getAddress() {
		return $this->address;
	}
	
	public function setCity($value) {
		$v = trim($value);
		$this->city = empty($v) ? null : $v;
		return $this;
	}
 
	public function getCity() {
		return $this->city;
	}
	
	public function setPostalcode($value) {
		$v = trim($value);
		$this->postalcode = empty($v) ? null : $v;
		return $this;
	}
 
	public function getPostalcode() {
		return $this->postalcode;
	}
	
	public function setDescription($value) {
		$v = trim($value);
		$this->description = empty($v) ? null : $v;
		return $this;
	}
 
	public function getDescription() {
		return $this->description;
	}
	
	public function setLogo($value) {
		$v = trim($value);
		$this->logo = empty($v) ? null : $v;
		return $this;
	}
 
	public function getLogo() {
		return $this->logo;
	}
	
	public function setUser_id($value) {
		$v = trim($value);
		$this->user_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getUser_id() {
		return $this->user_id;
	}
}

?>