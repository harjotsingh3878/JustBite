<?php

class Foods
{
	private $id;
	private $food_id;
    private $food;
    private $imgs;
    private $price;
    private $ingredients;
    private $description;
    private $type;
    private $meal;
    private $veg;
    private $spicy;
    private $stock;
    private $delivery;
    private $dtime;
    private $size;
    
    public function setId($value) {
		$v = trim($value);
		$this->id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getId() {
		return $this->id;
	}
    
    public function setFood_id($value) {
		$v = trim($value);
		$this->food_id = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFood_id() {
		return $this->food_id;
	}
    
    public function setFood($value) {
		$v = trim($value);
		$this->food = empty($v) ? null : $v;
		return $this;
	}
 
	public function getFood() {
		return $this->food;
	}
	
	public function setImgs($value) {
		$v = trim($value);
		$this->imgs = empty($v) ? null : $v;
		return $this;
	}
 
	public function getImgs() {
		return $this->imgs;
	}
	
	public function setPrice($value) {
		$v = trim($value);
		$this->price = empty($v) ? null : $v;
		return $this;
	}
 
	public function getPrice() {
		return $this->price;
	}
	
	public function setIngredients($value) {
		$v = trim($value);
		$this->ingredients = empty($v) ? null : $v;
		return $this;
	}
 
	public function getIngredients() {
		return $this->ingredients;
	}
	
	public function setDescription($value) {
		$v = trim($value);
		$this->description = empty($v) ? null : $v;
		return $this;
	}
 
	public function getDescription() {
		return $this->description;
	}
	
	public function setType($value) {
		$v = trim($value);
		$this->type = empty($v) ? null : $v;
		return $this;
	}
 
	public function getType() {
		return $this->type;
	}
	public function setMeal($value) {
		$v = trim($value);
		$this->meal = empty($v) ? null : $v;
		return $this;
	}
 
	public function getMeal() {
		return $this->meal;
	}
	
	public function setVeg($value) {
		$v = trim($value);
		$this->veg = empty($v) ? null : $v;
		return $this;
	}
 
	public function getVeg() {
		return $this->veg;
	}
	
	public function setSpicy($value) {
		$v = trim($value);
		$this->spicy = empty($v) ? null : $v;
		return $this;
	}
 
	public function getSpicy() {
		return $this->spicy;
	}
	
	public function setStock($value) {
		$v = trim($value);
		$this->stock = empty($v) ? null : $v;
		return $this;
	}
 
	public function getStock() {
		return $this->stock;
	}
	
	public function setDelivery($value) {
		$v = trim($value);
		$this->delivery = empty($v) ? null : $v;
		return $this;
	}
 
	public function getDelivery() {
		return $this->delivery;
	}
	
	public function setDtime($value) {
		$v = trim($value);
		$this->dtime = empty($v) ? null : $v;
		return $this;
	}
 
	public function getDtime() {
		return $this->dtime;
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