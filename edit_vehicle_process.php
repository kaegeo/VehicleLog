<?php
require('./config/config.php');

// Get the vehicle data
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$vehicle_type = filter_input(INPUT_POST, 'type');
$vehicle_make = filter_input(INPUT_POST, 'make');
$vehicle_model = filter_input(INPUT_POST, 'model');
$vehicle_year = filter_input(INPUT_POST, 'year');
$vehicle_year_purchased = filter_input(INPUT_POST, 'year_purchased');
$vehicle_color = filter_input(INPUT_POST, 'color');
$vehicle_VIN = filter_input(INPUT_POST, 'vin');
$vehicle_license_tag = filter_input(INPUT_POST, 'license_tag');
$vehicle_license_state = filter_input(INPUT_POST, 'license_state');
$vehicle_purchase_price = filter_input(INPUT_POST, 'purchase_price');
$vehicle_purchase_mileage = filter_input(INPUT_POST, 'purchase_mileage');



// Update vehicle in database 
$query = "UPDATE vehicle SET
		 vehicle_id = :vehicle_id,
		 vehicle_type = :vehicle_type,
		 vehicle_make = :vehicle_make,
		 vehicle_model = :vehicle_model,
		 vehicle_year = :vehicle_year,
		 vehicle_year_purchased = :vehicle_year_purchased,
		 vehicle_color = :vehicle_color,
		 vehicle_VIN = :vehicle_VIN,
		 vehicle_license_tag = :vehicle_license_tag,
		 vehicle_license_state = :vehicle_license_state,
		 vehicle_purchase_price = :vehicle_purchase_price,
		 vehicle_purchase_mileage = :vehicle_purchase_mileage,
		 date_edited = now()
    WHERE vehicle_ID = :vehicle_id";
	$statement = $db->prepare($query);
	$statement->bindValue(':vehicle_id', $vehicle_id);
	$statement->bindValue(':vehicle_type', $vehicle_type);
	$statement->bindValue(':vehicle_make', $vehicle_make);
	$statement->bindValue(':vehicle_model', $vehicle_model);
	$statement->bindValue(':vehicle_year', $vehicle_year);
	$statement->bindValue(':vehicle_year_purchased', $vehicle_year_purchased);
	$statement->bindValue(':vehicle_color', $vehicle_color);
	$statement->bindValue(':vehicle_VIN', $vehicle_VIN);
	$statement->bindValue(':vehicle_license_tag', $vehicle_license_tag);
	$statement->bindValue(':vehicle_license_state', $vehicle_license_state);
	$statement->bindValue(':vehicle_purchase_price', $vehicle_purchase_price);
	$statement->bindValue(':vehicle_purchase_mileage', $vehicle_purchase_mileage);
	$statement->execute();
	$statement->closeCursor();

$queryEdit = 'SELECT * FROM vehicle WHERE vehicle_id = :vehicle_id';
	$statement2 = $db->prepare($queryEdit);
	$statement2->bindValue(':vehicle_id', $vehicle_id);
	$statement2->execute();
	$recordEdit = $statement2->fetch();
	$vehicle_type = $recordEdit['vehicle_type'];
	$vehicle_make = $recordEdit['vehicle_make'];
	$vehicle_model = $recordEdit['vehicle_model'];
	$vehicle_year = $recordEdit['vehicle_year'];
	$vehicle_year_purchased = $recordEdit['vehicle_year_purchased'];	
	$vehicle_color = $recordEdit['vehicle_color'];
	$vehicle_VIN = $recordEdit['vehicle_VIN'];
	$vehicle_license_tag = $recordEdit['vehicle_license_tag'];
	$vehicle_license_state = $recordEdit['vehicle_license_state'];	
	$vehicle_purchase_price = $recordEdit['vehicle_purchase_price'];
	$vehicle_purchase_mileage = $recordEdit['vehicle_purchase_mileage'];
	$date_edited = $recordEdit['date_edited'];
	$statement2->closeCursor();

?>

<?php include "./header.php"; ?>

    <main>

		<h3>Edit Results</h3><br>

		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<td align="right"><strong>Vehicle ID:</strong></td>
				<td><?php echo $vehicle_id; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Type:</strong></td>
				<td><?php echo $vehicle_type; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Make:</strong></td>
				<td><?php echo $vehicle_make; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Model:</strong></td>
				<td><?php echo $vehicle_model; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Year:</strong></td>
				<td><?php echo $vehicle_year; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Year Purchased:</strong></td>
				<td><?php echo $vehicle_year_purchased; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Color:</strong></td>
				<td><?php echo $vehicle_color; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>VIN:</strong></td>
				<td><?php echo $vehicle_VIN; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>License Tag:</strong></td>
				<td><?php echo $vehicle_license_tag; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>License State:</strong></td>
				<td><?php echo $vehicle_license_state; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Purchase Price:</strong></td>
				<td><?php echo $vehicle_purchase_price; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Purchase Mileage:</strong></td>
				<td><?php echo $vehicle_purchase_mileage; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date Modified:</strong></td>
				<td><?php echo $date_edited; ?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td align="left">
			</table>
		</div>

		<form action="./vehicle_edit.php" method="POST" id="vehicle_edit">
		<input type="hidden" name="vehicleID" value="<?php echo $vehicle_id; ?>" />
		<button type="submit">Edit Again?</button>
		</form>
    </main>
	
<?php include "./footer.php"; ?>