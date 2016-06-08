<?php
	require 'dbconnect.php';
	if(isset($_GET['true'])){
		
    	echo "<script>alert('New student added. The given ID = " . $_GET["id"] . "')</script>";
	}
	if(isset($_GET['updated'])){
		
    	echo "<script>alert('Student updated')</script>";
	}


?>		

<html>
	<head>

		<title>Studentenformulier</title>
		
		<meta charset="UTF-8">
		<link rel="icon" href="favicon.png" type="image/x-icon"/>

	</head>

	<body>

		<?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            $_SESSION['message'] = null;
        }
    ?>

		<div class="wrapper">
			
			<h1>Studentform</h1>
			

				<div class="form">

					<form method="post" action="student.php">
					  <label>Firstname:</label><br>
					  <input type="text" name="firstname"><br>
					  <label>Prefix:</label><br>
					  <input type="text" name="prefix">
					  <br><label>Lastname:</label><br>
					  <input type="text" name="lastname">
					  <br><label>Address:</label><br>
					  <input type="text" name="address">
					  <br><label>Postalcode:</label><br>
					  <input type="text" name="postalcode">
					  <br><label>City:</label><br>
					  <input type="text" name="city">
					  <br><label>Email:</label><br>
					  <input type="text" name="email">
					  <br><label>Studentnumber:</label><br>
					  <input type="text" name="studentnumber">
					  <br>
					  <br>
					  <input type="submit" value="Submit" name="submit">
					</form>
				</div>	
			</div>

			<div class='footer'>

				<p class='footer_text'>© Deona Secreve 2016  |</p>
				

			</div>

	</body>

</html>	