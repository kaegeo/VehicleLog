<?php
	// Connect and log into vehicle_log database
    $dsn = 'mysql:host=localhost;dbname=yfowleba_vehicle_log';
    $username = 'yfowleba';
    $password = '29?Ch3_ygrg,=ktAjJ';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }

// Set the time zone and set the current date added
date_default_timezone_set('America/New_York');

?>