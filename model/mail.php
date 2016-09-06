<?php

class Mail
{
    private $to;
    private $subject;
    private $msg;
    private $header;
    
    public function setTo($value) {
		$v = trim($value);
		$this->to = empty($v) ? null : $v;
		return $this;
	}
 
	public function getTo() {
		return $this->to;
	}
	
	public function setSubject($value) {
		$v = trim($value);
		$this->subject = empty($v) ? null : $v;
		return $this;
	}
 
	public function getSubject() {
		return $this->subject;
	}
	
	public function setMsg($value) {
		$v = trim($value);
		$this->msg = empty($v) ? null : $v;
		return $this;
	}
 
	public function getMsg() {
		return $this->msg;
	}
	
	public function setHeader($value) {
		$v = trim($value);
		$this->header = empty($v) ? null : $v;
		return $this;
	}
 
	public function getHeader() {
		return $this->header;
	}
}

?>