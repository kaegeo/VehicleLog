<?php
$maintenance_type_id = filter_input(INPUT_POST, 'typeid');
$maintenance_type = filter_input(INPUT_POST, 'type');

    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'UPDATE maintenance_type SET
                 maintenance_type_id = :maintenance_type_id,
				 maintenance_type = :maintenance_type,
				 date_modified = now()
            WHERE maintenance_type_id = :maintenance_type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':maintenance_type_id', $maintenance_type_id);
    $statement->bindValue(':maintenance_type', $maintenance_type);
    $statement->execute();
    $statement->closeCursor();

$queryEdit = 'SELECT * FROM maintenance_type WHERE maintenance_type_id = :maintenance_type_id';
	$statement2 = $db->prepare($queryEdit);
	$statement2->bindValue(':maintenance_type_id', $maintenance_type_id);
	$statement2->execute();
	$recordEdit = $statement2->fetch();
	$maintenance_type = $recordEdit['maintenance_type'];
	$date_modified = $recordEdit['date_modified'];
	$statement2->closeCursor();
?>

<?php include "./header.php"; ?>

    <main>

		<h3>Edit Results</h3><br>

		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<td align="right"><strong>Maintenance Type ID:</strong></td>
				<td><?php echo $maintenance_type_id; ?></td>
				</tr>
				<tr>
				<tr>
				<td align="right"><strong>Type:</strong></td>
				<td><?php echo $maintenance_type; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Date Modified:</strong></td>
				<td><?php echo $date_modified; ?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td align="left">
			</table>
		</div>


		<form action="./maintenance_type_edit.php" method="POST" id="maintenance_type_edit">
		<input type="hidden" name="maintenance_typeID" value="<?php echo $maintenance_type_id; ?>" />
		<button type="submit">Edit Again?</button>
		</form>
    </main>
	
<?php include "./footer.php"; ?>