<?php

	# get selected sorting options from form in productinfo.php
	$descOrPrice = $_POST["sortby"];
	$upDown = $_POST["sortad"];

	# display sorting message according to what options user has selected
	if($descOrPrice == "productdescription") {
		if($upDown == "ASC") {	
			echo "Sorted by product description in ascending order.<br><br>";	
		}
		else {
			echo "Sorted by product description in descending order.<br><br>";	
		}
	}
	
	# display sorting message according to what options user has selected
	else {
		if($upDown == "ASC") {	
			echo "Sorted by price in ascending order.<br><br>";	
		}
		else {
			echo "Sorted by price in descending order.<br><br>";	
		}
	}

	# get product info with order based on sorting options selected
	$query = "SELECT * FROM product ORDER BY " . $descOrPrice . " " . $upDown . ";";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("databases query on customer info failed.");
	}

	# set up table and headings
	echo"<table><tr><th>PRODUCT</th><th>COST</th></tr>";
	
	# display product description and cost in products table
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $row['productdescription'] . "</td>";
		echo "<td>$" . number_format($row['costperitem'], 2) . "</td></tr>";		
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>
