<?php
$maintenance_type_id = filter_input(INPUT_POST, 'type_id');
$maintenance_type = filter_input(INPUT_POST, 'type');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'INSERT INTO maintenance_type
                 (maintenance_type_id, maintenance_type, date_modified)
              VALUES
                 (:maintenance_type_id, :maintenance_type, now() )';
    $statement = $db->prepare($query);
    $statement->bindValue(':maintenance_type_id', $maintenance_type_id);
    $statement->bindValue(':maintenance_type', $maintenance_type);
    $statement->execute();
    $statement->closeCursor();

    // Display the Vehicle List page
	$table_name = 'maintenance_type';
    include('table_list.php');
?>
