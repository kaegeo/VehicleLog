<?php
require('./config/config.php');
$query = 'SELECT *
          FROM maintenance
          ORDER BY maintenance_id';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();

$query = 'SELECT vehicle_id, vehicle_make, vehicle_model, vehicle_VIN
          FROM vehicle ORDER BY vehicle_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$vehicles = $statement->fetchAll();
	$statement->closeCursor();
	
$query = 'SELECT *
          FROM maintenance_type ORDER BY maintenance_type_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$maintenance_types = $statement->fetchAll();
	$statement->closeCursor();
	
?>
<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Add a Maintenance</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="add_maintenance_process.php" method="post" id="add_maintenance_process">

            <input type="hidden" name="maintenance_id" value="DEFAULT"><br>

            <label>Type ID:</label>
			<input list="maintenance_types" name="maintenance_type_id" id="maintenance_type_id" placeholder="Search maintenance types...">
			<datalist id="maintenance_types">
			
			<?php foreach ($maintenance_types as $maintenance_type) {
				echo '<option value="' . $maintenance_type['maintenance_type_id'] . '">' . 
				$maintenance_type['maintenance_type'] . '</option>';
			}
			?>
			</datalist><br>

            <label>Vehicle ID:</label>
			<input list="vehicles" name="vehicle_id" id="vehicle_id" placeholder="Search vehicles...">
			<datalist id="vehicles">
			
			<?php foreach ($vehicles as $vehicle) {
				echo '<option value="' . $vehicle['vehicle_id'] . '">' . 
				$vehicle['vehicle_make'] . ' | ' . $vehicle['vehicle_model'] . ' | ' . $vehicle['vehicle_VIN'] . '</option>';
			}
			?>
			</datalist><br>
			
            <label>Vendor:</label>
            <input type="text" name="vendor"><br>
			
            <label>Description:</label>
            <input type="text" name="description"><br>
			
            <label>Vendor Address:</label>
            <input type="text" name="vendor_address"><br>

            <label>Cost:</label>
            <input type="text" name="cost"><br>

            <label>Mileage:</label>
            <input type="text" name="mileage"><br>

            <label>Date:</label>
            <input type="date" name="date"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Maintenance"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>