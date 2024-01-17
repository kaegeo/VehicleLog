<?php
require('./config/config.php');

$fuel_id = filter_input(INPUT_POST, 'fuelID');

$query = 'SELECT * FROM fuel WHERE fuel_id = :fuel_id';
	$fuel_data = $db->prepare($query);
	$fuel_data->bindValue(':fuel_id', $fuel_id);
	$fuel_data->execute();
	$fuel = $fuel_data->fetch();
	$fuel_data->closeCursor();

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
    <header><h1>Edit Fuel</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="edit_fuel_process.php" method="post" id="fuel_edit">

            <input type="hidden" name="fuel_id" value="<?php echo $fuel['fuel_id']; ?>" /><br>

            <label>Vehicle ID:</label>
			<input list="vehicles" name="vehicle_id" id="vehicle_id" placeholder="Search vehicles..." 
			value="<?php echo $fuel['vehicle_id']; ?>" >
			<datalist id="vehicles">
			
			<?php foreach ($vehicles as $vehicle) {
				echo '<option value="' . $vehicle['vehicle_id'] . '">' . 
				$vehicle['vehicle_make'] . ' | ' . $vehicle['vehicle_model'] . ' | ' . $vehicle['vehicle_VIN'] . '</option>';
			}
			?>
			</datalist><br>

            <label>Source:</label>
            <input type="text" name="source" value="<?php echo $fuel['fuel_source']; ?>" ><br>

            <label>Gallons:</label>
            <input type="text" name="gallons" value="<?php echo $fuel['fuel_gallons']; ?>" ><br>
			
            <label>Cost:</label>
            <input type="text" name="cost" value="<?php echo $fuel['fuel_cost']; ?>" ><br>
			
            <label>Mileage:</label>
            <input type="text" name="mileage" value="<?php echo $fuel['fuel_mileage']; ?>" ><br>

            <label>Date:</label>
            <input type="date" name="date" value="<?php echo $fuel['fuel_date']; ?>" ><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Fuel"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>