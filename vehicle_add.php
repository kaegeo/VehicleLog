<?php
require('./config/config.php');
$query = 'SELECT *
          FROM vehicles
          ORDER BY vehicle_id';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Add a Vehicle</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="add_vehicle_process.php" method="post" id="add_vehicle_process">

            <input type="hidden" name="vehicle_id" value="DEFAULT"><br>

            <label>Type:</label>
			<?php
			$selected_value = 'Sedan';
			$check_selected = "";
			echo '<select name="type">' . PHP_EOL;
			for($i = 0; $i <= count($vehicle_types)-1; $i++){
			if($selected_value == $vehicle_types[$i]){$check_selected = ' selected';} else {$check_selected = '';}
			echo '<option value="' . $vehicle_types[$i] . '"' . $check_selected . '>' . $vehicle_types[$i] . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>

            <label>Make:</label>
            <input type="text" name="make"><br>

            <label>Model:</label>
            <input type="text" name="model"><br>
			
            <label>Year:</label>
			<?php
			echo '<select name="year">' . PHP_EOL;
			for($i = date("Y"); $i >= 1886; $i--){
			echo '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>
			
            <label>Year Purchased:</label>
			<?php
			echo '<select name="year_purchased">' . PHP_EOL;
			for($i = date("Y"); $i >= 1886; $i--){
			echo '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>
			
            <label>Color:</label>
            <input type="text" name="color"><br>
			
            <label>VIN:</label>
            <input type="text" name="vin"><br>

            <label>License Tag:</label>
            <input type="text" name="license_tag"><br>

            <label>License State:</label>
			<?php
			echo '<select name="license_state">' . PHP_EOL;
			for($i = 0; $i <= count($states_and_territories)-1; $i++){
			echo '<option value="' . $states_and_territories[$i] . '">' . $states_and_territories[$i] . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>

            <label>Purchase Price:</label>
            <input type="text" name="purchase_price"><br>

            <label>Purchase Mileage:</label>
            <input type="text" name="purchase_mileage"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>