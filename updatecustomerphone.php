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
		<h2>Update Customer Phone Number:</h2>
		
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
		<?php
			if(isset($_POST['pickacustomer'])) {
				# start a session if the user has picked a customer
				session_start();
				include "a3connecttodb.php";
				
				# do query on customer to display their phone number
				$query = "SELECT * FROM customer WHERE customerid=" . $_POST['pickacustomer'] . ";";

				$result = mysqli_query($connection, $query);       	
				if(!$result) {
							die("databases query on customer info failed.");
					}
				
				# display customer phone number
				while($row = mysqli_fetch_assoc($result)) {
					echo $row['firstname'] . " " . $row['lastname'] . "'s current phone number: " . $row["phonenumber"] . "<br><br>";
					echo "Enter " . $row['firstname'] . " " . $row['lastname'] . "'s new phone number if you would like to update it.<br>";
				}
			 
				mysqli_free_result($result);
				
				# set customer id to session variable to be able to retrieve it in uploadphone.php
				$_SESSION["whichCust"] = $_POST['pickacustomer'];
				
				# set up form for new phone number and load uploadphone.php when user submits form
				echo "<form action='uploadphone.php' method='post'>";
				echo "<input type='text' name='number' id='number' placeholder='555-5555'>";
				echo "<input type='submit' name='submit1' value='Update Number'>";
				echo "<input type='hidden' name='customerid' value='$whichCust'>";
				echo "</form>";
			}
		?>
	</body>
</html>
