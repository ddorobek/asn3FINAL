<?php
	include 'a3connecttodb.php';
	
	# get customer id, product id, and quantity from form in insertpurchase.php
	$custID = $_POST["pickcustid"];
	$prodID = $_POST["pickprodid"];
	$quant = $_POST["quantity"];
	$preexisting = "";

	# if user doesn't select a customer, display error message and exit
	if($custID == "-1") {
		echo "Please select a customer.<br>";
		if($prodID != "-1") {
			exit();
		}
	}	

	# if user doesn't select a product, display error message and exit
	if($prodID == "-1") {
		echo "Please select a product.<br>";
		exit();
	}

	# if user doesn't enter a quantity, display error message and exit
	if($quant == "") {
		echo "Please enter the quantity purchased. <br>";
		exit();
	}	

	# if user enters a quantity below 1, display error message and exit
	if($quant <= 0) {
		echo "Please enter a valid quantity. <br>";
		exit();
	}

	# get purchase info from customer and product selected in form
	$query = "SELECT * FROM purchases WHERE customerid=" . $custID . " AND productid=" . $prodID . ";";

	$result = mysqli_query($connection, $query);	
	if(!$result) {
		die("databases query on customer info failed.");
	}

	while($row = mysqli_fetch_assoc($result)) {
		
		if($row["quantitypurchased"] > 0) {
			
			#add old and new quantity if the product has already been purchased by customer
			$newQuant = $row["quantitypurchased"] + $quant;

			# update quantity in purchases
			$query="UPDATE purchases SET quantitypurchased=" . $newQuant . " WHERE customerid=" . $custID . " AND productid=" . $prodID . ";";
			
			if(!mysqli_query($connection, $query)) {
				die("Error while trying add new purchase1." . mysqli_error($connection));
			}
		
			else {
				# get customer and product info to display sucess message
				$query = "SELECT * FROM customer, product WHERE productid=" . $prodID . " AND customerid=" . $custID . ";";
		
				$result = mysqli_query($connection, $query);
				if(!$result) {
					die("Error while searching for customer." . mysqli_error($connection));
				}

				# display success message
				$row = mysqli_fetch_assoc($result);
				echo $quant . " " . $row['productdescription'] . " added to " . $row['firstname'] . " " . $row['lastname'] . "'s purchases. <br>";
			}

			exit();
		}
	}

	mysqli_free_result($result);

	# if customer has not yet purchased selected product, insert new purchase into purchases table
	$query="INSERT INTO purchases VALUES ('" . $custID . "', '" . $prodID . "', " . $quant . ");";

	if(!mysqli_query($connection, $query)) {
		die("Error while trying add new purchase." . mysqli_error($connection));
	}
		
	else {
		# get customer and product info to display sucess message
		$query = "SELECT * FROM customer, product WHERE productid=" . $prodID . " AND customerid=" . $custID . ";";
		
		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("Error while searching for customer." . mysqli_error($connection));
		}

		# display success message
		$row = mysqli_fetch_assoc($result);
		echo $quant . " " . $row['productdescription'] . " added to " . $row['firstname'] . " " . $row['lastname'] . "'s purchases. <br>";
	}

	mysqli_close($connection);
?>
