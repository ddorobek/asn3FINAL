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
		<h2>View products that have never been purchased:</h2>
		
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr> 
		
		<script src="insertproduct.js"></script>
		
		<?php
			# do query on products that have not been purchased
			$query = "SELECT productid, productdescription FROM product WHERE productid NOT IN (SELECT productid FROM purchases);";

			$result = mysqli_query($connection, $query);

			if(!$result) {
				die("database query on product information failed.");
			}

			# set up table and its headings
			echo "<table><tr><th>PRODUCT</th><th>PRODUCT ID</th></tr>";

			# display products that have never been purchased
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['productdescription'] . "</td>";
				echo "<td>" . $row['productid'] . "</td></tr>";
			}
			mysqli_free_result($result);
			mysqli_close($connection);
		?>
	</body>
</html>
