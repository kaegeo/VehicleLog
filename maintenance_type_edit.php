<?php
require('./config/config.php');

$maintenance_type_id = filter_input(INPUT_POST, 'maintenance_typeID');

$query = 'SELECT * FROM maintenance_type WHERE maintenance_type_id = :maintenance_type_id';
	$maintenance_type_data = $db->prepare($query);
	$maintenance_type_data->bindValue(':maintenance_type_id', $maintenance_type_id);
	$maintenance_type_data->execute();
	$maintenance_type = $maintenance_type_data->fetch();
	$maintenance_type_data->closeCursor();

?>

<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Edit Maintenance Type</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="edit_maintenance_type_process.php" method="post" id="maintenance_type_edit">

            <input type="hidden" name="typeid" value="<?php echo $maintenance_type_id; ?>" /><br>

            <label>Maintenance Type:</label>
			<input type="text" name="type" value="<?php echo $maintenance_type['maintenance_type']; ?>" ><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Maintenance Type"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>