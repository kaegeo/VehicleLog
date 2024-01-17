<?php
// Connect to config file to connect to database
require('./config/config.php');

if (!empty($_GET)) {
    $table_name = filter_input(INPUT_GET, 'table_name');
}

$clean_table_name = str_replace('_', ' ', $table_name);

$columns = [];

$show_cols = $db->prepare("SHOW COLUMNS FROM $table_name;");
$show_cols->execute();
while ($col = $show_cols->fetch(PDO::FETCH_ASSOC)) {
   array_push($columns, $col['Field']);
}

// Create query to access data from vehicles table
$query = "SELECT * FROM {$table_name} ORDER BY {$columns[0]}";
	$statement = $db->prepare($query);
	$statement->execute();
	$table_rows = $statement->fetchAll();
	$statement->closeCursor();
?>

<?php include "./header.php"; ?>

		<header><h1><?php echo ucwords($clean_table_name) . ' List'?></h1></header>
		
		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<?php
				for($i = 0; $i < count($columns); $i++) {
					echo '<th>' . ucwords(str_replace($clean_table_name . ' ', '', str_replace('_', ' ', $columns[$i]))) . '</th>';
				}
				?>
				
				</tr>
				
				<?php foreach ($table_rows as $table_row) : ?>
				<tr>
					<td><?php echo $table_row[$columns[0]]; ?></td>
					<?php
					for($i = 1; $i < count($columns); $i++) {
						$column = $columns[$i];
					    echo '<td>' . $table_row[$column] . '</td>';
					}
					?>
					<td><?php include "./edit_button.php"; ?></td>
				</tr>
				<?php endforeach; ?>
				
				
		</table>
	</div>
		<p>
			<a href=<?php echo $table_name . '_add.php' ?>>Add a <?php echo ucwords($clean_table_name) ?></a><br>
			<a href="index.php">Return Home</a>
		</p>
<?php include "./footer.php"; ?>