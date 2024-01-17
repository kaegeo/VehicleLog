<?php
require('./config/config.php');

$maintenance_id = filter_input(INPUT_POST, 'maintenanceID');

$query = 'SELECT * FROM maintenance WHERE maintenance_id = :maintenance_id';
	$maintenance_data = $db->prepare($query);
	$maintenance_data->bindValue(':maintenance_id', $maintenance_id);
	$maintenance_data->execute();
	$maintenance = $maintenance_data->fetch();
	$maintenance_data->closeCursor();

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
    <header><h1>Edit Maintenance</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="edit_maintenance_process.php" method="post" id="maintenance_edit">

            <input type="hidden" name="maintenance_id" value="<?php echo $maintenance['maintenance_id']; ?>" /><br>

            <label>Type ID:</label>
			<input list="maintenance_types" name="type_id" id="type_id" 
			placeholder="Search maintenance types..." value="<?php echo $maintenance['maintenance_type_id']; ?>" >
			<datalist id="maintenance_types">
			
			<?php foreach ($maintenance_types as $maintenance_type) {
				echo '<option value="' . $maintenance_type['maintenance_type_id'] . '">' . 
				$maintenance_type['maintenance_type'] . '</option>';
			}
			?>
			</datalist><br>

            <label>Vehicle ID:</label>
			<input list="vehicles" name="vehicle_id" id="vehicle_id" placeholder="Search vehicles..." 
			value="<?php echo $maintenance['vehicle_id']; ?>" >
			<datalist id="vehicles">
			
			<?php foreach ($vehicles as $vehicle) {
				echo '<option value="' . $vehicle['vehicle_id'] . '">' . 
				$vehicle['vehicle_make'] . ' | ' . $vehicle['vehicle_model'] . ' | ' . $vehicle['vehicle_VIN'] . '</option>';
			}
			?>
			</datalist><br>
			
            <label>Vendor:</label>
            <input type="text" name="vendor" value="<?php echo $maintenance['maintenance_vendor']; ?>"><br>
			
            <label>Description:</label>
            <input type="text" name="description" value="<?php echo $maintenance['maintenance_description']; ?>"><br>
			
            <label>Vendor Address:</label>
            <input type="text" name="vendor_address" value="<?php echo $maintenance['maintenance_vendor_address']; ?>"><br>

            <label>Cost:</label>
            <input type="text" name="cost" value="<?php echo $maintenance['maintenance_cost']; ?>"><br>

            <label>Mileage:</label>
            <input type="text" name="mileage" value="<?php echo $maintenance['maintenance_mileage']; ?>"><br>

            <label>Date:</label>
            <input type="date" name="date" value="<?php echo $maintenance['maintenance_date']; ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Maintenance"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>