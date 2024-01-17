<?php
require('./config/config.php');

$query = 'SELECT *
          FROM fuel
          ORDER BY fuel_id';
$statement = $db->prepare($query);
$statement->execute();
$fuels = $statement->fetchAll();
$statement->closeCursor();

$query = 'SELECT vehicle_id, vehicle_make, vehicle_model, vehicle_VIN
          FROM vehicle ORDER BY vehicle_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$vehicles = $statement->fetchAll();
	$statement->closeCursor();
	
?>
<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Add Fuel</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="add_fuel_process.php" method="post" id="add_fuel_process">

            <input type="hidden" name="fuel_id" value="DEFAULT"><br>

            <label>Vehicle ID:</label>
			<input list="vehicles" name="vehicle_id" id="vehicle_id" placeholder="Search vehicles...">
			<datalist id="vehicles">
			
			<?php foreach ($vehicles as $vehicle) {
				echo '<option value="' . $vehicle['vehicle_id'] . '">' . 
				$vehicle['vehicle_make'] . ' | ' . $vehicle['vehicle_model'] . ' | ' . $vehicle['vehicle_VIN'] . '</option>';
			}
			?>
			</datalist><br>

            <label>Source:</label>
            <input type="text" name="source"><br>

            <label>Gallons:</label>
            <input type="text" name="gallons"><br>
			
            <label>Cost:</label>
            <input type="text" name="cost"><br>
			
            <label>Mileage:</label>
            <input type="text" name="mileage"><br>

            <label>Date:</label>
            <input type="date" name="date"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Fuel"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>