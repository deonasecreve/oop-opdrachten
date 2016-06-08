<?php
require 'dbconnect.php';

class student {

	public $id;			//5
	public $studentnumber;		//99026577
	public $firstname;			//Deona
	public $prefix;				//van
	public $lastname;			//Secreve
	public $address;			//Hugo de Grootstraat 12
	public $postalcode;			//4206ZE
	public $city;				//Gorinchem
	public $email;				//deona.secreve@outlook.com

	public function __construct($sn, $fn, $pf, $ln, $add, $pc, $ct, $em) {
	
	$this->studentnumber = $sn;
	$this->firstname = $fn;
	$this->prefix = $pf;
	$this->lastname = $ln;
	$this->address= $add;
	$this->postalcode= $pc;
	$this->city = $ct;
	$this->email = $em;

	}

	public function ToStringDisplayName() {
		return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . ' ( ' . $this->studentnumber . ')';
	}

	public function ToStringAddress() {
		return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . '<br>' . $this->address . '<br>' . $this->postalcode . ' ' . $this->city;
	}

	public function ToStringEmail() {
		return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . ' &lt;' . $this->Email . '&gt;';
	}


	public function SaveToDb($dblink) {
		foreach ($this->students as $student) {
	    	$result = mysqli_query($conn,"SELECT * FROM students WHERE studentnumber = $student->tudentnumber");
	        $num_rows = mysqli_num_rows($result);
	        if ($num_rows > 0) {
	        	$sql = "UPDATE students SET firstname='$student->firstname', refix='$student->prefix', lastname='$student->lastname' , address='$student->address', postalcode='$student->postalcode', city='$student->city', email='$student->email' WHERE studentnumber = $student->studentnumber;";
	         	 if ($conn->query($sql) === TRUE) {
	            
	          	}else{
	            echo "Error: " . $sql . "<br>" . $conn->error;
	        }
	      	}else {
		        $sql = "INSERT INTO students (firstname, prefix, lastname, address, postalcode, city, email, studentnumber)
		        VALUES ('$student->firstname', '$student->prefix', '$student->lastname', '$student->address', '$student->postalcode', '$student->city', '$student->email', '$student->studentnumber')";
		        if ($conn->query($sql) === TRUE) {
		         
		        } else {
		          echo "Error: " . $sql . "<br>" . $conn->error;
		        }
	       }
	    		
	    	}
    }
	

	public function LoadFromDb($dblink, $id) {
		$sql = "SELECT * FROM students WHERE Id=" . $id;
		$result = $dblink->query($sql);
		if ($result->num_rows == 1) {
		    
			$row = $result->fetch_assoc();
			$this->Id = $row['id'];
			$this->StudentNumber = $row['studentnumber'];
			$this->FirstName = $row['firstname'];
			$this->Prefix = $row['prefix'];
			$this->LastName = $row['lastname']; 
			$this->Address = $row['address'];
			$this->PostalCode = $row['postalcode'];
			$this->City = $row['city'];
			$this->Email = $row['email'];
		} elseif ($result->num_rows == 0) {
		    echo "0 rows found";
		}	
		elseif ($result->num_rows > 1) {
		    echo "more than 1 rows found";
		}	
	}
}
			
	

