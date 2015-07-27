<?php

class BBT {
	
	private $loanerName="BBT";
	private $loaner_id = 1;
	private $lockdays = [15, 30, 45, 60] ;
	
    //30fixed
    private $fixed30 = array (
    	"lock_days" => 	[15, 30, 45, 60], 
    	"loan_type" => 1,	
        "range" => "A16:E35"
    );

    //20fixed
    private $fixed20 = array (
    	"lock_days" => 	[15, 30, 45, 60], 
    	"loan_type" => 2,
        "range" => "F16:J35"
    );

    //15fixed
    private $fixed15 = array (
    	"lock_days" => 	[15, 30, 45, 60], 
    	"loan_type" => 3,
    	"range" => "K16:O35"
    );
    
    //10fixed
    private $fixed10 = array (
    	"lock_days" => 	[15, 30, 45, 60], 
    	"loan_type" => 4,
    	"range" => "A39:E58"
    );
    
    
    public function getMap() {
	    return array(
            "fixed30" => $this->fixed30, 
	        "fixed20" => $this->fixed20,			
	        "fixed15" => $this->fixed15,			
   	        "fixed10" => $this->fixed10			
	    );
    }
    
    public function getPurchaserId(){
    	return $this->loaner_id;
    }
    
    public function getLockDays() {
    	return $this->lockdays;
    }
    
}
?>