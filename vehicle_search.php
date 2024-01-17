<?php
require('./config/config.php');

?>

<?php include "./header.php"; ?>
    <header><h1>Vehicle Search</header>
	<form action="./vehicle_search_results.php" method="POST" id="search_string">
	<label for="searchfor">Search for:</label>
	<input id="searchfor" type="input" name="search_string">
	<button type="submit">Run Search</button>
	</form>
	<p>
	    <a href="vehicle_list.php">Go to Vehicle List</a><br>
		<a href="index.php">Return Home</a>
	</p>

<?php include "./footer.php"; ?>