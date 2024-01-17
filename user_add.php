<?php
require('./config/config.php');
$query = 'SELECT *
          FROM user
          ORDER BY user_id';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Add a User</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="add_user_process.php" method="post" id="add_user_process">

            <input type="hidden" name="user_id" value="DEFAULT"><br>

            <label>First Name:</label>
			<input type="text" name="first_name"><br>

            <label>Last Name:</label>
            <input type="text" name="last_name"><br>

            <label>Password:</label>
            <input type="text" name="password"><br>
			
            <label>Email:</label>
            <input type="text" name="email"><br>
			
            <label>Role:</label>
			<select name="role">
                <option value="User">User</option>
			    <option value="Admin">Admin</option>
			</select><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add User"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>