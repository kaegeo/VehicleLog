<?php
$fuel_id = filter_input(INPUT_POST, 'fuel_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$fuel_source = filter_input(INPUT_POST, 'source');
$fuel_gallons = filter_input(INPUT_POST, 'gallons');
$fuel_cost = filter_input(INPUT_POST, 'cost');
$fuel_mileage = filter_input(INPUT_POST, 'mileage');
$fuel_date = filter_input(INPUT_POST, 'date');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'UPDATE fuel SET
                 fuel_id = :fuel_id,
				 vehicle_id = :vehicle_id,
				 fuel_source = :fuel_source,
				 fuel_gallons = :fuel_gallons,
				 fuel_cost = :fuel_cost,
				 fuel_mileage = :fuel_mileage,
				 fuel_date = :fuel_date,
				 fuel_date_modified = now()
			WHERE fuel_id = :fuel_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':fuel_id', $fuel_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':fuel_source', $fuel_source);
    $statement->bindValue(':fuel_gallons', $fuel_gallons);
	$statement->bindValue(':fuel_cost', $fuel_cost);
    $statement->bindValue(':fuel_mileage', $fuel_mileage);
    $statement->bindValue(':fuel_date', $fuel_date);
    $statement->execute();
    $statement->closeCursor();

$queryEdit = 'SELECT * FROM fuel WHERE fuel_id = :fuel_id';
	$statement2 = $db->prepare($queryEdit);
	$statement2->bindValue(':fuel_id', $fuel_id);
	$statement2->execute();
	$recordEdit = $statement2->fetch();
	$vehicle_id = $recordEdit['vehicle_id'];
	$fuel_source = $recordEdit['fuel_source'];
	$fuel_gallons = $recordEdit['fuel_gallons'];
	$fuel_cost = $recordEdit['fuel_cost'];
	$fuel_mileage = $recordEdit['fuel_mileage'];	
	$fuel_date = $recordEdit['fuel_date'];
	$fuel_date_modified = $recordEdit['fuel_date_modified'];
	$statement2->closeCursor();

?>

<?php include "./header.php"; ?>

    <main>

		<h3>Edit Results</h3><br>

		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<td align="right"><strong>Fuel ID:</strong></td>
				<td><?php echo $fuel_id; ?></td>
				</tr>
				<tr>
				<tr>
				<td align="right"><strong>Vehicle ID:</strong></td>
				<td><?php echo $vehicle_id; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Source:</strong></td>
				<td><?php echo $fuel_source; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Gallons:</strong></td>
				<td><?php echo $fuel_gallons; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Cost:</strong></td>
				<td><?php echo $fuel_cost; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Mileage:</strong></td>
				<td><?php echo $fuel_mileage; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date:</strong></td>
				<td><?php echo $fuel_date; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date Modified:</strong></td>
				<td><?php echo $fuel_date_modified; ?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td align="left">
			</table>
		</div>


		<form action="./fuel_edit.php" method="POST" id="fuel_edit">
		<input type="hidden" name="fuelID" value="<?php echo $fuel_id; ?>" />
		<button type="submit">Edit Again?</button>
		</form>
    </main>
	
<?php include "./footer.php"; ?>