<?php
$user_id = filter_input(INPUT_POST, 'user_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$user_password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$user_role = filter_input(INPUT_POST, 'role');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'UPDATE user SET
                 user_id = :user_id,
				 first_name = :first_name,
				 last_name = :last_name,
				 user_password = :user_password,
				 email = :email,
				 user_role = :user_role,
				 date_modified = now()
			WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':user_password', $user_password);
	$statement->bindValue(':email', $email);
    $statement->bindValue(':user_role', $user_role);
    $statement->execute();
    $statement->closeCursor();

$queryEdit = 'SELECT * FROM user WHERE user_id = :user_id';
	$statement2 = $db->prepare($queryEdit);
	$statement2->bindValue(':user_id', $user_id);
	$statement2->execute();
	$recordEdit = $statement2->fetch();
	$first_name = $recordEdit['first_name'];
	$last_name = $recordEdit['last_name'];
	$user_password = $recordEdit['user_password'];
	$email = $recordEdit['email'];
	$user_role = $recordEdit['user_role'];
	$date_modified = $recordEdit['date_modified'];
	$statement2->closeCursor();

?>

<?php include "./header.php"; ?>

    <main>

		<h3>Edit Results</h3><br>

		<div class="table-responsive">
			<table class="table table-striped-columns">
				<tr>
				<td align="right"><strong>User ID:</strong></td>
				<td><?php echo $user_id; ?></td>
				</tr>
				<tr>
				<tr>
				<td align="right"><strong>First Name:</strong></td>
				<td><?php echo $first_name; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Last Name:</strong></td>
				<td><?php echo $last_name; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Password:</strong></td>
				<td><?php echo $user_password; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Email:</strong></td>
				<td><?php echo $email; ?></td>
				</tr>
				<tr>
				<td align="right"><strong>Role:</strong></td>
				<td><?php echo $user_role; ?></td>
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


		<form action="./user_edit.php" method="POST" id="user_edit">
		<input type="hidden" name="userID" value="<?php echo $user_id; ?>" />
		<button type="submit">Edit Again?</button>
		</form>
    </main>
	
<?php include "./footer.php"; ?>