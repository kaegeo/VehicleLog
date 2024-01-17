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

<!-- the head section -->
<head>
    <title>Add a Vehicle</title>
</head>

<!-- the body section -->
<body>
    <header><h1>Add a Vehicle</h1></header>

    <main>
        <form action="add_vehicle_process.php" method="post" id="projectlab3">

            <input type="hidden" name="vehicle_id" value="DEFAULT"><br>

            <label>Vehicle Type:</label>
            <input type="text" name="type"><br>

            <label>Vehicle Make:</label>
            <input type="text" name="make"><br>

            <label>Vehicle Model:</label>
            <input type="text" name="model"><br>
			
            <label>Vehicle Year:</label>
            <input type="text" name="year"><br>

            <label>Vehicle Year Purchased:</label>
            <input type="text" name="year_purchased"><br>

            <label>Vehicle Color:</label>
            <input type="text" name="color"><br>
			
            <label>Vehicle VIN:</label>
            <input type="text" name="vin"><br>

            <label>Vehicle License Tag:</label>
            <input type="text" name="license_tag"><br>

            <label>Vehicle License State:</label>
            <input type="text" name="license_state"><br>
			
            <label>Vehicle Purchase Price:</label>
            <input type="text" name="purchase_price"><br>

            <label>Vehicle Purchase Mileage:</label>
            <input type="text" name="purchase_mileage"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
    </main>
	
</body>
</html>