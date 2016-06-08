<?php

require_once 'student.php';
require_once 'dbconnect.php';


class studentcollection {


	public $students;

	public function __construct() {
	 	$this->students = [];
}

	

	public function GetFirstNamesArray() {
        $names = [];
        foreach ($this->students as $student) {
            array_push($names, $student->firstname);
        }
        return $names;
    }

	public function GetListFirstNames(){
		$out = '<ul>';
        foreach ($this->students as $student) {
            $out .= '<li>' .  $student->firstname . '</li>' ;
        }

        $out .= '</ul>';
        return $out;
	}

	public function Add($student){
		array_push($this->students, $student);

	}

	public function RemoveByFirstname($searchfirstname){
		// loop over all students and take both key (0,1,2) and value(=student)
foreach($this->students as $elementKey => $student ) {

// for the current student, loop over all its properties
foreach($student as $propertyname => $propertyvalue) {

if($propertyname == 'firstname' && $propertyvalue == $searchfirstname){
//delete this particular object from the $array
unset($this->students[$elementKey]);
			} 
		}
	}
}

	

	public function FindByFirstname($searchtext){

		 $found = [];  
        foreach ($this->students as $student) {
            if ( $student->firstname == $searchtext ) array_push($found, $student);
        }
        return $found;

	}

	public function ToJSon(){
		return json_encode($this->students);
	}

	public function WriteJsonToFile($filename) {
        return file_put_contents($filename, $this->ToJson() );
    }

	public function WriteToDatabase(){

		foreach ($this->students as $student) {
	    	$result = mysqli_query($conn,"SELECT * FROM students WHERE studentnumber = $student->studentnumber");
	        $num_rows = mysqli_num_rows($result);
	        if ($num_rows > 0) {
	        	$sql = "UPDATE students SET firstname='$student->firstname', prefix='$student->prefix', lastname='$student->lastname' , address='$student->address', postalcode='$student->postalcode', city='$student->city', email='$student->email' WHERE studentnumber = $student->studentnumber;";
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

	public function WriteToFile($filename){
		return file_put_contents($filename, $this->ToJson() );
	}

	public function ReadFromDatabase($dblink){
		// run query
$query = mysqli_query($dblink, "SELECT * FROM students");

// set array
$array = array();

// look through query
while($row = mysqli_fetch_assoc($query)){

  // add each row returned into an array
  $array[] = $row;

  // OR just echo the data:
  echo $row['firstname']; // etc

}





	}

	

}


	
