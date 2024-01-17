<?php
// Connect to config file to connect to database
require('./config/config.php');

// Create query to access data from vehicles table
$query = 'SELECT * FROM vehicles ORDER BY vehicle_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$vehicles = $statement->fetchAll();
	$statement->closeCursor();


?>

<html>

<head>
    <title>Vehicle List</title>

<style>
table, th, td {
	border: 1px solid;
}
</style>
</head>

	<body>
		<header><h1>Vehicle List</h1></header>
		
		<table>
			<tr>
				<th>Vehicle ID</th>
				<th>Vehicle Type</th>
				<th>Vehicle Make</th>
				<th>Vehicle Model</th>
				<th>Vehicle Year</th>
				<th>Vehicle Year Purchased</th>
				<th>Vehicle Color</th>
				<th>Vehicle VIN</th>
				<th>Vehicle Licence Tag</th>
				<th>Vehicle License State</th>
				<th>Vehicle Purchase Price</th>
				<th>Vehicle Purchase Mileage</th>
				<th>Date Modified</th>
			</tr>
			
			<?php foreach ($vehicles as $vehicle) : ?>
			<tr>
				<td><?php echo $vehicle['vehicle_id']; ?></td>
				<td><?php echo $vehicle['vehicle_type']; ?></td>
				<td><?php echo $vehicle['vehicle_make']; ?></td>
				<td><?php echo $vehicle['vehicle_model']; ?></td>
				<td><?php echo $vehicle['vehicle_year']; ?></td>
				<td><?php echo $vehicle['vehicle_year_purchased']; ?></td>
				<td><?php echo $vehicle['vehicle_color']; ?></td>
				<td><?php echo $vehicle['vehicle_VIN']; ?></td>
				<td><?php echo $vehicle['vehicle_license_tag']; ?></td>
				<td><?php echo $vehicle['vehicle_license_state']; ?></td>
				<td><?php echo $vehicle['vehicle_purchase_price']; ?></td>
				<td><?php echo $vehicle['vehicle_purchase_mileage']; ?></td>
				<td><?php echo $vehicle['date_edited']; ?></td>
				<td><?php include "./edit_button.php"; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>

		<p>
			<a href="projectlab3.php">Add a Vehicle</a><br>
			<a href="index.php">Return Home</a>
		</p>
	</body>
</html>


