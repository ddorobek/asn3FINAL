<?php
	$quantity = $_POST["quantity"];

	# if user did not enter quantity, display error message
	if($quantity == "") {
		echo "Please enter a quantity. <br>";
		exit();
	}

	# do query on purchases over the given quantity
	$query = "SELECT * FROM purchases LEFT JOIN customer ON purchases.customerid=customer.customerid AND purchases.quantitypurchased>" . $quantity . " LEFT JOIN product ON purchases.productid=product.productid;" ;

	$result = mysqli_query($connection, $query);

	if(!$result) {
		die("databases query on customer info failed.");
	}

	# set up table headings
	echo "<table><tr><th>CUSTOMER</th><th>PRODUCT PURCHASED</th><th>QUANTITY PURCHASED</th></tr>";

	# display information for products purchased over given quantity
	while($row = mysqli_fetch_assoc($result)) {
		if($row['customerid'] != NULL) {
			echo "<tr><td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
			echo "<td>" . $row["productdescription"] . "</td>";
			echo "<td>" . $row["quantitypurchased"] . "</td></tr>";
		}
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>
