<?php

class QueryDB {

    private $conn;
    private $result;
    
    function QueryDB() {
        require 'data/db.php';
        // Create connection
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$this->conn) {
	        die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    function runQuery ($q) {
        //$query = 'select GetConfirmingLoanUpperLimit("02163", "two_unit") ';
        $this->result = $this->conn->query($q);
    }
    
    function isConfirming($zip, $propertyType, $loanAmount) {
    	$query= 'select GetConfirmingLoanUpperLimit("' . $zip. '", "' . $propertyType. '")';
    	$this->runQuery($query);
    	$row = $this->result->fetch_array(MYSQLI_NUM);
    	echo "Confirming limit :" . $row[0] . "  ";
    	echo "Loan Amount :" . $loanAmount . " <br> ";
    	echo ($row[0] > $loanAmount ) ? "Yes" :  "No";
    }
    
    function printResult($q) {
        $this->runQuery($q);
        var_dump($this->result->fetch_all());
    }
    
    function getFees() {
    	$query = "select * from fees where id=1 ;" ;
    	$this->runQuery($query);
    	$rows =  $this->result->fetch_assoc();
    	$this->printAssoc($rows);
    	$sum=0;
    	foreach($rows as $x => $x_value) {
    		if ($x != 'id') {
    			$sum += $x_value;
    		}
    	}
    	echo "Sum of Fee is : " . $sum;
    			
    }
    
    function getGroupedSRPByZip($zipCode, $loanType, $loanAmount, $purchaser){
        $query = 'select GetGroupedSRPByZip("02460", ' .
            $loanType . "," .
            $loanAmount . "," .
            $purchaser . 
            ")";
        $this->runQuery($query);
    	$row = $this->result->fetch_array(MYSQLI_NUM);
    	var_dump($row);        
    }
    
    function getRate($purchaserID, $loanType, $lockDays, $zipCode, $loanAmount, $margiin) {
        $query = 'call proc_GetRate(' . $purchaserID . ',' .
            $loanType . ',' .
            $lockDays . ',' .
            '"'.$zipCode.'"'  . ',' .
            $loanAmount . ',' .
            $margiin .
            ")";
        echo $query . "<br>" ;
        $this->runQuery($query);
        while ($row = $this->result->fetch_assoc()) {
        	$this->printAssoc($row);
        }
        mysqli_free_result($this->result);
    }
    
    function _destruct() {
        $this->conn->close();
    }
    
    function printAssoc($assocArray){
    	foreach($assocArray as $x => $x_value) {
    		//echo "Key=" . $x . ", Value=" . $x_value;
    		echo $x . "=" . $x_value . ",";
    	}
        echo "<br>";
    }

}


?>