<?php
require('./config/config.php');

$user_id = filter_input(INPUT_POST, 'userID');

$query = 'SELECT * FROM user WHERE user_id = :user_id';
	$user_data = $db->prepare($query);
	$user_data->bindValue(':user_id', $user_id);
	$user_data->execute();
	$user = $user_data->fetch();
	$user_data->closeCursor();

?>

<!DOCTYPE html>
<html>
<?php include "./form_arrays.php"; ?>
<?php include "./header.php"; ?>
    <header><h1>Edit a User</h1></header>

    <main>
	<div class="mx-auto" style="width: 400px;">
        <form action="edit_user_process.php" method="post" id="user_edit">

            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>" /><br>

            <label>First Name:</label>
			<input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" ><br>

            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" ><br>

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $user['user_password']; ?>" ><br>
			
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $user['email']; ?>" ><br>
			
            <label>Role:</label>
			<select name="role">
                <option value="User" <?php if ($user['user_role'] == "User") {echo ' selected';} ?> >User</option>
			    <option value="Admin" <?php if ($user['user_role'] == "Admin") {echo ' selected';} ?> >Admin</option>
			</select><br>
			
            <label>&nbsp;</label>
            <input type="submit" value="Edit User"><br>
        </form>
        <p><a href="index.php">Return Home</a></p>
	</div>
    </main>
	
<?php include "./footer.php"; ?>