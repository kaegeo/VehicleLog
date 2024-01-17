<?php
$maintenance_id = filter_input(INPUT_POST, 'maintenance_id');
$maintenance_type_id = filter_input(INPUT_POST, 'type_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$maintenance_vendor = filter_input(INPUT_POST, 'vendor');
$maintenance_description = filter_input(INPUT_POST, 'description');
$maintenance_vendor_address = filter_input(INPUT_POST, 'vendor_address');
$maintenance_cost = filter_input(INPUT_POST, 'cost');
$maintenance_mileage = filter_input(INPUT_POST, 'mileage');
$maintenance_date = filter_input(INPUT_POST, 'date');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'UPDATE maintenance SET
                 maintenance_id = :maintenance_id,
				 maintenance_type_id = :maintenance_type_id,
				 vehicle_id = :vehicle_id,
				 maintenance_vendor = :maintenance_vendor,
				 maintenance_description = :maintenance_description,
				 maintenance_vendor_address = :maintenance_vendor_address,
				 maintenance_cost = :maintenance_cost,
				 maintenance_mileage = :maintenance_mileage,
				 maintenance_date = :maintenance_date,
				 maintenance_date_modified = now()
			WHERE maintenance_id = :maintenance_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':maintenance_id', $maintenance_id);
    $statement->bindValue(':maintenance_type_id', $maintenance_type_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':maintenance_vendor', $maintenance_vendor);
	$statement->bindValue(':maintenance_description', $maintenance_description);
    $statement->bindValue(':maintenance_vendor_address', $maintenance_vendor_address);
    $statement->bindValue(':maintenance_cost', $maintenance_cost);
    $statement->bindValue(':maintenance_mileage', $maintenance_mileage);
    $statement->bindValue(':maintenance_date', $maintenance_date);
    $statement->execute();
    $statement->closeCursor();

$queryEdit = 'SELECT * FROM maintenance WHERE maintenance_id = :maintenance_id';
	$statement2 = $db->prepare($queryEdit);
	$statement2->bindValue(':maintenance_id', $maintenance_id);
	$statement2->execute();
	$recordEdit = $statement2->fetch();
	$maintenance_type_id = $recordEdit['maintenance_type_id'];
	$vehicle_id = $recordEdit['vehicle_id'];
	$maintenance_vendor = $recordEdit['maintenance_vendor'];
	$maintenance_description = $recordEdit['maintenance_description'];
	$maintenance_vendor_address = $recordEdit['maintenance_vendor_address'];	
	$maintenance_cost = $recordEdit['maintenance_cost'];
	$maintenance_mileage = $recordEdit['maintenance_mileage'];
	$maintenance_date = $recordEdit['maintenance_date'];
	$maintenance_date_modified = $recordEdit['maintenance_date_modified'];	
	$statement2->closeCursor();

?>

<?php include "./header.php"; ?>

    <main>

		<h3>Edit Results</h3><br>

		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<td align="right"><strong>Maintenance ID:</strong></td>
				<td><?php echo $maintenance_id; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Type:</strong></td>
				<td><?php echo $maintenance_type_id; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Vehicle ID:</strong></td>
				<td><?php echo $vehicle_id; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Vendor:</strong></td>
				<td><?php echo $maintenance_vendor; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Description:</strong></td>
				<td><?php echo $maintenance_description; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Vendor Address:</strong></td>
				<td><?php echo $maintenance_vendor_address; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Cost:</strong></td>
				<td><?php echo $maintenance_cost; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Mileage:</strong></td>
				<td><?php echo $maintenance_mileage; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date:</strong></td>
				<td><?php echo $maintenance_date; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date Modified:</strong></td>
				<td><?php echo $maintenance_date_modified; ?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td align="left">
			</table>
		</div>


		<form action="./maintenance_edit.php" method="POST" id="maintenance_edit">
		<input type="hidden" name="maintenanceID" value="<?php echo $maintenance_id; ?>" />
		<button type="submit">Edit Again?</button>
		</form>
    </main>
	
<?php include "./footer.php"; ?>