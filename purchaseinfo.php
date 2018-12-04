<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Assignment 3 DB</title>
		<link rel="stylesheet" type="text/css" href="a3styles.css">
	</head>
	<body>
		<script src="purchaseinfo.js"></script>
		
		<?php
			include "a3connecttodb.php";
		?>
		
		<h1>Assignment 3 Database</h1>
		<h2>View total purchases:</h2>
		
		<!-- set up form for user to pick product -->
		<form action="" method="post">
			<select name="pickprodid" id="pickprodid">
				<option value="-1">Select Product</option>
				<?php
					#include getproduct.php to display product options
					include "getproduct.php";
				?>
			</select>
		</form>
		<br>
		<a href="newindex.php">Back to Home</a>
		<br>
		<hr>
		
		<?php
			if(isset($_POST['pickprodid'])) {
				include "a3connecttodb.php";
				$prodID = $_POST['pickprodid'];

				# if user selects product, do query on this product to get purchase info
				$query = "SELECT SUM(quantitypurchased), productdescription, purchases.productid, costperitem FROM purchases LEFT JOIN product ON purchases.productid=product.productid GROUP BY purchases.productid;";
				
				$result = mysqli_query($connection, $query);	
				if(!$result) {
							die("databases query on purchases info failed.");
					}

				# set up table and its headings
				echo "<table><tr><th>PRODUCT ID</th><th>PRODUCT DESCRIPTION</th><th>TOTAL PURCHASES</th><th>TOTAL PROFIT</th></tr>";

				# display purchase info for product selected
				while($row = mysqli_fetch_assoc($result)) {
					if($row['productid'] == $prodID) {
						$desc = $row['productdescription'];					
						$quant = $row['SUM(quantitypurchased)'];
						$cost = $row['costperitem'];
						$totalProfit = number_format($quant * $cost, 2);

						echo "<tr><td>" . $prodID . "</td>";
						echo "<td>" . $desc . "</td>";
						echo "<td>" . $quant . "</td>";
						echo "<td>$" . $totalProfit . "</td></tr>";
						echo "</tr></table>";
						exit();
					}
				}
				mysqli_free_result($result);
				
				# do query on product if product has never been purchased
				$query = "SELECT * from product WHERE productid=" . $prodID . ";";

				$result = mysqli_query($connection, $query);					
				if(!$result) {
							die("databases query on purchases info failed.");
				}
				
				# if product has never been purchased, display not applicable in table columns
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $prodID . "</td>";
					echo "<td>" . $row['productdescription'] . "</td>";
					echo "<td>0</td>";
					echo "<td>$0.00</td></tr></table>";
				}	
				
				mysqli_free_result($result);
				mysqli_close($connection);				
			}
		?>
	</body>
</html>
