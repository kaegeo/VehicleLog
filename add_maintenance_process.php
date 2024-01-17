<?php
$maintenance_id = filter_input(INPUT_POST, 'maintenance_id');
$maintenance_type_id = filter_input(INPUT_POST, 'type_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$maintenance_vendor = filter_input(INPUT_POST, 'vendor');
$maintenance_description = filter_input(INPUT_POST, 'description');
$maintenance_vendor_address = filter_input(INPUT_POST, 'vendor_address');
$maintenance_cost = filter_input(INPUT_POST, 'cost');
$maintenance_mileage = filter_input(INPUT_POST, 'mileage');
$maintenance_date = filter_input(INPUT_POST, 'date');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'INSERT INTO maintenance
                 (maintenance_id, maintenance_type_id, vehicle_id, maintenance_vendor, maintenance_description,
				 maintenance_vendor_address, maintenance_cost, maintenance_mileage, maintenance_date,
				 maintenance_date_modified)
              VALUES
                 (:maintenance_id, :maintenance_type_id, :vehicle_id, :maintenance_vendor, :maintenance_description,
				 :maintenance_vendor_address, :maintenance_cost, :maintenance_mileage, :maintenance_date,
				 now() )';
    $statement = $db->prepare($query);
    $statement->bindValue(':maintenance_id', $maintenance_id);
    $statement->bindValue(':maintenance_type_id', $maintenance_type_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':maintenance_vendor', $maintenance_vendor);
	$statement->bindValue(':maintenance_description', $maintenance_description);
    $statement->bindValue(':maintenance_vendor_address', $maintenance_vendor_address);
    $statement->bindValue(':maintenance_cost', $maintenance_cost);
    $statement->bindValue(':maintenance_mileage', $maintenance_mileage);
    $statement->bindValue(':maintenance_date', $maintenance_date);
    $statement->execute();
    $statement->closeCursor();

    // Display the Vehicle List page
	$table_name = 'maintenance';
    include('table_list.php');
?>