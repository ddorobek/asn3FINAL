<?php
	$query = "SELECT * FROM product ORDER BY productdescription";
	$result = mysqli_query($connection, $query);

	if(!$result) {
		die("databases query failed.");
	}

	# For each row (product), display product as an option in select field.
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='" . $row["productid"] . "'>";
		echo $row["productdescription"] . " ($" . $row["costperitem"] . ")";
		echo "</option>";
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>
