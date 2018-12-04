<?php
	$query = "SELECT * FROM customer ORDER BY lastname";
	$result = mysqli_query($connection, $query);

	if(!$result) {
		die("databases query failed.");
	}

	# For each row (customer), display customer as an option in select field.
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='" . $row["customerid"] . "'>";
		echo $row["firstname"] . " " . $row["lastname"];
		echo "</option>";
	}

	mysqli_free_result($result);
?>
