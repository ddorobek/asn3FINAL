<?php
	$whichCust = $_POST["pickacustomer"]; #get customer id from select form in customerinfo.php
	$found = false;

	# get customer's info using their id
	$query="SELECT * FROM customer WHERE customerid=" . $whichCust;

	$result = mysqli_query($connection, $query);	
	if(!$result) {
		die("databases query on customer info failed.");
	}

	$row = mysqli_fetch_assoc($result);
	
	echo "<br>" . $row['firstname'] . " " . $row['lastname'] . " purchases:<br><br>";	

	# get customer's purchase info using id
	$query = "SELECT * FROM purchases, customer, product WHERE customer.customerid=" . $whichCust . " AND customer.customerid=purchases.customerid AND purchases.productid=product.productid ORDER BY product.productdescription;";

	$result = mysqli_query($connection, $query);

	if(!$result) {
		die("databases query on customer info failed.");
	}

	# create table and table headings
	echo "<table><tr><th>PRODUCT</th><th>COST</th><th>QUANTITY</th></tr>";

	# display customer purchases in table
	while($row = mysqli_fetch_assoc($result)) {
		if($row['productdescription'] != NULL) {
			echo "<tr><td>" . $row['productdescription'] . "</td>";
			echo "<td>$" . number_format($row['costperitem'], 2) . "</td>";
			echo "<td>" . $row["quantitypurchased"] . "</td>";
			$found = true;
		}
	}

	# if customer has not purchased anything, set table elements as not applicable
	if($found == false) {
		echo "<tr><td>N/A</td>";
		echo "<td>N/A</td>";
		echo "<td>N/A</td></tr>";
	}	

	mysqli_free_result($result);
	mysqli_close($connection);
?>	
