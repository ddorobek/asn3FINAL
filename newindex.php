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
		<h2>Welcome to Damien Dorobek's assignment 3 database.</h2>
		<p>Select an option below to modify the database:</p>
		<ul>
		<li><a href="customerinfo.php">View Customer Information</a></li>
		<li><a href="productinfo.php">View Product Information</a></li>
		<li><a href="insertpurchase.php">Insert New Purchase</a></li>
		<li><a href="insertcustomer.php">Insert New Customer</a></li>
		<li><a href="updatecustomerphone.php">Update Customer Phone Number</a></li>
		<li><a href="deletecustomer.php">Delete Customer</a></li>
		<li><a href="givenquantity.php">View Customers Who Bought More Than a Given Quantity of a Product</a></li>
		<li><a href="neverpurchased.php">View Never Before Purchased Products</a></li>
		<li><a href="purchaseinfo.php">View Total Number of Purchases for a Product</a></li>
		</ul>
	</body>
</html>
