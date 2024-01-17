<?php
// Get the vehicle data
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$vehicle_type = filter_input(INPUT_POST, 'type');
$vehicle_make = filter_input(INPUT_POST, 'make');
$vehicle_model = filter_input(INPUT_POST, 'model');
$vehicle_year = filter_input(INPUT_POST, 'year');
$vehicle_year_purchased = filter_input(INPUT_POST, 'year_purchased');
$vehicle_color = filter_input(INPUT_POST, 'color');
$vehicle_VIN = filter_input(INPUT_POST, 'vin');
$vehicle_license_tag = filter_input(INPUT_POST, 'license_tag');
$vehicle_license_state = filter_input(INPUT_POST, 'license_state');
$vehicle_purchase_price = filter_input(INPUT_POST, 'purchase_price');
$vehicle_purchase_mileage = filter_input(INPUT_POST, 'purchase_mileage');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'INSERT INTO vehicle
                 (vehicle_id, vehicle_type, vehicle_make, vehicle_model, vehicle_year,
				 vehicle_year_purchased, vehicle_color, vehicle_VIN, vehicle_license_tag,
				 vehicle_license_state, vehicle_purchase_price, vehicle_purchase_mileage,
				 date_edited)
              VALUES
                 (:vehicle_id, :vehicle_type, :vehicle_make, :vehicle_model, :vehicle_year,
				 :vehicle_year_purchased, :vehicle_color, :vehicle_VIN, :vehicle_license_tag,
				 :vehicle_license_state, :vehicle_purchase_price, :vehicle_purchase_mileage, 
				 now() )';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':vehicle_type', $vehicle_type);
    $statement->bindValue(':vehicle_make', $vehicle_make);
    $statement->bindValue(':vehicle_model', $vehicle_model);
	$statement->bindValue(':vehicle_year', $vehicle_year);
    $statement->bindValue(':vehicle_year_purchased', $vehicle_year_purchased);
    $statement->bindValue(':vehicle_color', $vehicle_color);
    $statement->bindValue(':vehicle_VIN', $vehicle_VIN);
    $statement->bindValue(':vehicle_license_tag', $vehicle_license_tag);
    $statement->bindValue(':vehicle_license_state', $vehicle_license_state);
    $statement->bindValue(':vehicle_purchase_price', $vehicle_purchase_price);
    $statement->bindValue(':vehicle_purchase_mileage', $vehicle_purchase_mileage);
    $statement->execute();
    $statement->closeCursor();

    // Display the Vehicle List page
	$table_name = 'vehicle';
    include('table_list.php');

?>