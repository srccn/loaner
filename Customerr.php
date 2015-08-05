<?php 

Class Customer() {
	
	public $AppName;
	public $AppGender;
	public $AppPhoneNumber;
	public $AppEmail;
	public $AppClosingDate;
	
	function Customer($name, $phone, $email) {
		$this->AppName = $name;
		$this->AppPhoneNumber = $phone;
		$this->AppEmail = $email;
	}
	
	function setClosingDate () {
		//enter closing date 
	}
	
	function update() {
		//update information in DB
	}
	
}

?>