<?php
$user_id = filter_input(INPUT_POST, 'user_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$user_password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$user_role = filter_input(INPUT_POST, 'role');


    require_once('./config/config.php');

    // Add the product to the database  
    $query = 'INSERT INTO user
                 (user_id, first_name, last_name, user_password, email,
				 user_role, date_created, date_lastlogin, date_modified)
              VALUES
                 (:user_id, :first_name, :last_name, :user_password, :email,
				 :user_role, now(), now(), now() )';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':user_password', $user_password);
	$statement->bindValue(':email', $email);
    $statement->bindValue(':user_role', $user_role);
    $statement->execute();
    $statement->closeCursor();

    // Display the Vehicle List page
	$table_name = 'user';
    include('table_list.php');

?>