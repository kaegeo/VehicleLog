<?php
$fuel_id = filter_input(INPUT_POST, 'fuel_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$fuel_source = filter_input(INPUT_POST, 'source');
$fuel_gallons = filter_input(INPUT_POST, 'gallons');
$fuel_cost = filter_input(INPUT_POST, 'cost');
$fuel_mileage = filter_input(INPUT_POST, 'mileage');
$fuel_date = filter_input(INPUT_POST, 'date');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'INSERT INTO fuel
                 (fuel_id, vehicle_id, fuel_source, fuel_gallons, fuel_cost,
				 fuel_mileage, fuel_date, fuel_date_modified)
              VALUES
                 (:fuel_id, :vehicle_id, :fuel_source, :fuel_gallons, :fuel_cost,
				 :fuel_mileage, :fuel_date, now() )';
    $statement = $db->prepare($query);
    $statement->bindValue(':fuel_id', $fuel_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':fuel_source', $fuel_source);
    $statement->bindValue(':fuel_gallons', $fuel_gallons);
	$statement->bindValue(':fuel_cost', $fuel_cost);
    $statement->bindValue(':fuel_mileage', $fuel_mileage);
    $statement->bindValue(':fuel_date', $fuel_date);
    $statement->execute();
    $statement->closeCursor();

    // Display the Vehicle List page
	$table_name = 'fuel';
    include('table_list.php');
?>