<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Assignment 3 DB</title>
		<link rel="stylesheet" type="text/css" href="a3styles.css">
	</head>
	<body>
		<script src="productinfo.js"></script>
		
		<?php
			include "a3connecttodb.php";
		?>
		
		<h1>Assignment 3 Database</h1>
		<h2>View Product Information:</h2>
		
		<script src="insertproduct.js"></script>
		
		<!-- Set up form for user to select their sorting options -->
		<form action="" method="post">
			<p style="display: inline;">Sort by:</p>
			<select name="sortby" id="sortby">
				<option value="productdescription">Description</option>
				<option value="costperitem">Price</option>
			</select>
			
			<select name="sortad" id="sortad">
				<option value="ASC">Ascending</option>
				<option value="DESC">Descending</option>
			</select>
			
			<input type="submit" name="submit" value="View Products">
		</form>
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<!-- if the user has selected their sorting options and clicked "View Products", include displayproductinfo.php -->
		<?php
			if(isset($_POST['sortby']) && isset($_POST['sortad'])) {
				include "a3connecttodb.php";
				include "displayproductinfo.php";
			}
		?>
	</body>
</html>
