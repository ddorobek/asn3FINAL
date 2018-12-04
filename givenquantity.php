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
		<h2>View customers who have purchased more than given quantity:</h2>

		<script src="insertproduct.js"></script>
		
		<!-- set up form for user to enter quantity -->
		<form action="" method="post">
			<input type="number" name="quantity" id="quantity" placeholder="Enter Quantity">
			<input type="submit" name="submit" value="View Customer Purchases">
		</form>
		
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<!-- once user enters quantity, include getquantity.php -->
		<?php
			if(isset($_POST['quantity'])) {
				include "getquantity.php";
			}
		?>
	</body>
</html>
