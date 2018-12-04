<?php
	include 'a3connecttodb.php';

	# get customer id, name, city, and phone number from form in insertcustomer.php
	$custID = $_POST["custID"];
	$fname = $_POST["firstname"];
	$lname = $_POST["lastname"];
	$city = $_POST["city"];
	$phone = $_POST["number"];
	$invalid = false;

	# if user doesn't input a customer id, display error message
	if($custID == "") {
		$invalid = true;
		echo "Enter your customer ID. <br>";
	}
	
	# if user doesn't input a customer first name, display error message
	if($fname == "") {
		$invalid = true;
		echo "Enter your first name. <br>";
	}
	
	# if user doesn't input a customer last name, display error message
	if($lname == "") {
		$invalid = true;
		echo "Enter your last name. <br>";
	}
	
	# if user doesn't input a city, display error message
	if($city == "") {
		$invalid = true;
		echo "Enter your city. <br>";
	}
	
	# if user doesn't input a phone number, display error message
	if($phone == "") {
		$invalid = true;
		echo "Enter your phone. <br>";
	}

	# if user inputs a phone number with incorrect format, display error message
	if(strlen($phone) != 8 || strpos($phone, "-") != 3 || !ctype_digit(substr($phone, 0, 2)) || !ctype_digit(substr($phone, 4, 7))) {
		$invalid = true;
		echo "Enter a valid phone number with the format: 555-5555. <br>";
	}
	
	# if user inputs a customer id with incorrect format, display error message
	if(strlen($custID) > 2 || !ctype_digit($custID)) {
		$invalid = true;
		echo "Enter a valid customer ID with the format: 00. <br>";
	}

	# if any of the above messages were displayed, exit
	if($invalid) {
		exit();
	}

	# do query on inputted customer id to see if a customer already exists
	$query = "SELECT * FROM customer WHERE customerid=" . $custID . ";";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("databases query on customer failed.");
	}
	
	# if a customer is found (already exists) display message to user
	while($row = mysqli_fetch_assoc($result)) {
		if($row['customerid'] == $custID) {
			echo $row['firstname'] . " " . $row['lastname'] . "  already exists with customer ID: " . $row['customerid'] . "<br>"; 
			exit();		
		}
	}

	mysqli_free_result($result);

	# insert customer into table
	$query="INSERT INTO customer VALUES ('" . $custID . "', '" . $fname . "', '" . $lname . "', '" . $city . "', '" . $phone . "', NULL" . ");";

	if(!mysqli_query($connection, $query)) {
		die("Error while trying add new customer." . mysqli_error($connection));
	}
		
	else {
		# display success message to user
		echo "Customer " . $fname . " " . $lname . " (ID: " . $custID . ") was added to the database.<br>";
	}
	
	mysqli_close($connection);
?>
