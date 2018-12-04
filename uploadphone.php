<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<title>Assignment 3 DB</title>
			<link rel="stylesheet" type="text/css" href="a3styles.css">
	</head>
	<body>
		<h1>Assignment 3 Database</h1>
		<h2>Update Customer Phone Number:</h2>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		<?php
			# start session to get customer's old phone nubmer from updatecustomerphone.php
			session_start();
			include 'a3connecttodb.php';

			$number = $_POST["number"];
			$custID = $_SESSION['whichCust']; # get customer id from previous session

			# if user enters invalid phone number (i.e. bad formatting), display error message and link to try again
			if($number == "" | strlen($number) != 8 || strpos($number, "-") != 3 || !ctype_digit(substr($number, 0, 2)) || !ctype_digit(substr($number, 4, 7))) {
				echo "You have entered an invalid phone number: " . $number . "<br>";
				echo "<br>";
				echo "Please enter a phone number with the following format: 555-5555<br><br>";
				echo "<a href='updatecustomerphone.php'>Try again</a><br>";
				echo "<br>";
				exit();
				
			}

			# do query on customer to display their old phone number
			$query = "SELECT * FROM customer WHERE customerid=" . $custID . ";";

			$result = mysqli_query($connection, $query);
			if(!$result) {
				die("databases query on customer info failed.");
			}

			# display customer's old phone number
			while($row = mysqli_fetch_assoc($result)) {
				echo $row['firstname'] . " " . $row['lastname'] . "'s phone number was updated.<br><br>";
				echo "Old phone number: " . $row['phonenumber'] . "<br>";
			}
			mysqli_free_result($result);

			# do query on customer to update customer's phone number
			$query = "UPDATE customer SET phonenumber='" . $number . "' WHERE customerid=" . $custID . ";";

			if(!mysqli_query($connection, $query)) {
				die("Error while trying update phone number." . mysqli_error($connection));
			}

			# display customer's new phone number
			echo "New phone number: " . $number . "<br>";
			mysqli_close($connection);
		?>
	</body>
</html>
