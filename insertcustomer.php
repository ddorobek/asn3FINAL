<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Assignment 3 DB</title>
		<link rel="stylesheet" type="text/css" href="a3styles.css">
	</head>
	<body>
		<script src="a3index.js"></script>
		
		<?php
			include "a3connecttodb.php";
		?>
		
		<h1>Assignment 3 Database</h1>
		<h2>Insert New Customer:</h2>
		
		<script src="insertcustomer.js"></script>
		
		<!-- Set up form for user to input customer id, name, city, and phone number for customer to insert -->
		<form action="" method="post">
			<input type="text" name="custID" id="custID" placeholder="Customer ID">
			<input type="text" name="firstname" id="firstname" placeholder="First Name">
			<input type="text" name="lastname" id="lastname" placeholder="Last Name">
			<input type="text" name="city" id="city" placeholder="City">
			<input type="text" name="number" id="number" placeholder="555-5555">
			<input type="submit" name="submit" value="Insert Customer">
		</form>
		
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<!-- if the user has inputted information for new customer, include "uploadcustomer.php" -->
		<?php
			if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['city']) && isset($_POST['number'])) {
				include "a3connecttodb.php";
				include "uploadcustomer.php";
			}	
		?>
	</body>
</html>
