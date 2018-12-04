<?php
	$custDelete = $_POST["pickacustomer"];

	# do query on purchases to delete all of customer's purchases
	$query = "SELECT * FROM purchases where customerid=" . $custDelete . ";";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("databases query on customer info failed.");
	}

	# delete all of customer's purchases
	while($row = mysqli_fetch_assoc($result)) {
		$delQuery = "DELETE FROM purchases WHERE customerid=" . $custDelete . ";";
		$delResult = mysqli_query($connection, $delQuery);
		
		if(!$delResult) {
			die("databases query on deleting customer from purchases failed.");
		}
	}

	mysqli_free_result($result);

	# do query on customer to get customer name for success message
	$query = "SELECT * FROM customer WHERE customerid=" . $custDelete . ";";
	$result = mysqli_query($connection, $query);
	
	# save customer info for success message
	$customer = mysqli_fetch_assoc($result);
	
	mysqli_free_result($result);

	#do query on customer to delete customer
	$query = "DELETE FROM customer WHERE customerid=" . $custDelete . ";";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("databases query on deleting customer failed.");
	}

	else {
		if($customer["firstname"] == "") {
			exit();
		}

		# once customer is deleted, display success message
	 	echo $customer["firstname"] . " " . $customer["lastname"] . " was deleted.<br>";
	}
?>
