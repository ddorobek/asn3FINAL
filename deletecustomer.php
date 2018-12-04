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
		<h2>Delete Customer:</h2>
		
		<!-- Set up form for user to select customer -->
		<form action="" method="post"> 
			<select name="pickacustomer" id="pickacustomer">
				<option value="-1">Select Customer</option>
				<?php
					# Include getcustomer.php to show customer names in select list
					include "getcustomer.php";
				?>
			</select>
		</form>
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<!-- if user has selected a customer, include deletecustomerinfo.php -->
		<?php
			if(isset($_POST['pickacustomer'])) {
				include "a3connecttodb.php";
				include "deletecustomerinfo.php";		
			}
		?>
	</body>
</html>
