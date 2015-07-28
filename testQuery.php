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
    	var_dump($rows);
    	$sum=0;
    	foreach($rows as $x => $x_value) {
    		//echo "Key=" . $x . ", Value=" . $x_value;
    		//echo "<br>";
    		if ($x != 'id') {
    			$sum += $x_value;
    		}
    	}
    	echo "Sum of Fee is : " . $sum;
    			
    }
    
    
    function _destruct() {
        $this->conn->close();
    }

}


?>