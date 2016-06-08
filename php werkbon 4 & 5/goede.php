public function SaveToDb($dblink) {
			$result = mysqli_query($dblink, "SELECT * FROM students WHERE studentnumber = $this->studentnumber");
					
			        $num_rows = mysqli_num_rows($result);
			        if ($num_rows > 0){
			            $sql = "UPDATE students SET firstname='$this->firstname', prefix='$this->prefix', lastname='$this->lastname', address='$this->address', postalcode='$this->postalcode', city='$this->city', email='$this->email' WHERE studentnumber = $this->studentnumber;";
			            if ($dblink->query($sql) === TRUE){
			                header ('C:\wamp\www\formulier.php?updated');
			            }else{
			                echo "Error: " . $sql . "<br>" . $dblink->error;
			            }
			        }else{
					$sql = "INSERT INTO students (firstname, prefix, lastname, address, postalcode, city, email, studentnumber) VALUES ('$this->firstname', '$this->prefix', '$this->lastname', '$this->address', '$this->postalcode', '$this->city', '$this->email', '$this->studentnumber')";
					if($dblink->query($sql) === TRUE){
						$last_id = $dblink->insert_id;
						header('C:\wamp\www\formulier.php?updated?true&id=' . $last_id);
					}
					else{
						echo "Error: " . $sql . "<br>" . $dblink->error;
			

		}






public function LoadFromDatabase($dblink, $id) {
			$sql = "SELECT * FROM students WHERE id=" . $id;

			$result = $dblink->query($sql);

			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();

			$this->id = $row['id'];
			$this->studentnumber = $row['studentnumber'];
			$this->firstname = $row['firstname'];
			$this->prefix = $row['prefix'];
			$this->lastname = $row['lastname']; 
			$this->address = $row['address'];
			$this->postalcode = $row['postalcode'];
			$this->city = $row['city'];
			$this->email = $row['email'];
		} elseif ($resul->num_rows == 0) {
			echo "0 rows found";

		}
		elseif ($result->num_rows > 1){
			echo "more than 1 rows found";
		}
	}





	$sql = "INSERT INTO students (tudentnumber, firstname, prefix, lastname, address, postalcode, city, email)  VALUES ('$this->studentnumber', '$this->firstname', '$this->prefix', '$this->lastname', '$this->address', '$this->postalcode', '$this->city', '$this->email')";
		if ($dblink->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $dblink->error;
		}