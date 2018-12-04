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
		<h2>Insert New Purchase:</h2>
		
		<script src="insertproduct.js"></script>
		
		<!-- Set up form for user to select customer, product, and quantity user is inserting -->
		<form action="" method="post">
			<select name="pickcustid" id="pickcustid">
				<option value ="-1">Select Customer</option>
				<?php 
					# Include getcustomer.php to show customer names in select list
					include "getcustomer.php";
				?>
			</select>
			<select name="pickprodid" id="pickprodid">
				<option value="-1">Select Product</option>
				<?php
					include "getproduct.php";
				?>
			</select>
			<input type="number" name="quantity" id="quantity" placeholder="Enter Quantity">
			<input type="submit" name="submit" value="Insert Product">
		</form>
		
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<!-- if the user has selected the customer and product they are inserting for and clicked "Insert Product", include uploadpurchase.php -->
		<?php
			if(isset($_POST['pickcustid']) && isset($_POST['pickprodid'])) {
				include "a3connecttodb.php";
				include "uploadpurchase.php";
			}
		?>
	</body>
</html>
