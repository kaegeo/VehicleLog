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

<?php include "./header.php"; ?>

		<header><h1>Vehicle List</h1></header>
		
		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
					<th>Vehicle ID</th>
					<th>Type</th>
					<th>Make</th>
					<th>Model</th>
					<th>Year</th>
					<th>Year Purchased</th>
					<th>Color</th>
					<th>VIN</th>
					<th>Licence Tag</th>
					<th>License State</th>
					<th>Purchase Price</th>
					<th>Purchase Mileage</th>
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
	</div>
		<p>
			<a href="vehicle_add.php">Add a Vehicle</a><br>
			<a href="index.php">Return Home</a>
		</p>
<?php include "./footer.php"; ?>


