<?php
// Connect to config file to connect to database
require('./config/config.php');

$names = [];
$show_cols = $db->prepare("SHOW COLUMNS FROM vehicles;");
$show_cols->execute();
while ($col = $show_cols->fetch(PDO::FETCH_ASSOC)) {
   array_push($names, $col['Field']);
}

foreach ($names as $name) {
	echo $name . ' ';
}

?>