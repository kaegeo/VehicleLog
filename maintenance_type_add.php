<?php
require('./config/config.php');
$query = 'SELECT *
          FROM maintenance_type
          ORDER BY maintenance_type_id';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Add a Maintenance Type</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="add_maintenance_type_process.php" method="post" id="add_maintenance_type_process">

            <input type="hidden" name="maintenance_type_id" value="DEFAULT"><br>

            <label>Maintenance Type:</label>
			<input type="text" name="type"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Maintenance Type"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>