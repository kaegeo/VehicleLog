<?php
require('./config/config.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicleID');

$query = 'SELECT * FROM vehicle WHERE vehicle_id = :vehicle_id';
	$vehicle_data = $db->prepare($query);
	$vehicle_data->bindValue(':vehicle_id', $vehicle_id);
	$vehicle_data->execute();
	$vehicle = $vehicle_data->fetch();
	$vehicle_data->closeCursor();
	
?>

<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Edit Vehicle</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
		<div class="col">
        <form action="edit_vehicle_process.php" method="post" id="vehicle_edit">
		
            <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>" /><br>

            <label>Type:</label>
			<?php
			$selected_value = $vehicle['vehicle_type'];
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
            <input type="text" name="make" value="<?php echo $vehicle['vehicle_make']; ?>" /><br>

            <label>Model:</label>
            <input type="text" name="model" value="<?php echo $vehicle['vehicle_model']; ?>" /><br>
			
            <label>Year:</label>
			<?php
			$selected_value = $vehicle['vehicle_year'];
			$check_selected = "";
			echo '<select name="year">' . PHP_EOL;
			for($i = date("Y"); $i >= 1886; $i--){
			if($selected_value == $i){$check_selected = ' selected';} else {$check_selected = '';}
			echo '<option value="' . $i . '"' . $check_selected . '>' . $i . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>

            <label>Year Purchased:</label>
			<?php
			$selected_value = $vehicle['vehicle_year_purchased'];
			$check_selected = "";
			echo '<select name="year_purchased">' . PHP_EOL;
			for($i = date("Y"); $i >= 1886; $i--){
			if($selected_value == $i){$check_selected = ' selected';} else {$check_selected = '';}
			echo '<option value="' . $i . '"' . $check_selected . '>' . $i . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>
			
            <label>Color:</label>
            <input type="text" name="color" value="<?php echo $vehicle['vehicle_color']; ?>" /><br>
			
            <label>VIN:</label>
            <input type="text" name="vin" value="<?php echo $vehicle['vehicle_VIN']; ?>" /><br>

            <label>License Tag:</label>
            <input type="text" name="license_tag" value="<?php echo $vehicle['vehicle_license_tag']; ?>" /><br>

            <label>License State:</label>
			<?php
			$selected_value = $vehicle['vehicle_license_state'];
			$check_selected = "";
			echo '<select name="license_state">' . PHP_EOL;
			for($i = 0; $i <= count($states_and_territories)-1; $i++){
			if($selected_value == $states_and_territories[$i]){$check_selected = ' selected';} else {$check_selected = '';}
			echo '<option value="' . $states_and_territories[$i] . '"' . $check_selected . '>' . $states_and_territories[$i] . '</option>' . PHP_EOL;
			}
			echo '</select>';
			?>
			<br>

            <label>Purchase Price:</label>
            <input type="text" name="purchase_price" value="<?php echo $vehicle['vehicle_purchase_price']; ?>" /><br>

            <label>Purchase Mileage:</label>
            <input type="text" name="purchase_mileage" value="<?php echo $vehicle['vehicle_purchase_mileage']; ?>" /><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Vehicle" ><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
		</div>
	</div>
    </main>
	
<?php include "./footer.php"; ?>