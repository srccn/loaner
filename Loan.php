<?php

class Loan {
	
	private $loanAmount;
	private $zipCode;
	private $loanId_name_array = Array();
	
	function LaonType(){
		//populate $loanId_name_array
	}
	
	function setZipCode($zipCode){
		$this->zipCode = zipCode;
	}
	
	function setLoanAmount($amount){
		$this->loanAmount = $amount;
	}
	
	function getLoanTypeIdByName($loanName) {
		
	}

	function isConforming() {
		
	}
	
	function isValidLoanName(){
		
	}
	
}

?>