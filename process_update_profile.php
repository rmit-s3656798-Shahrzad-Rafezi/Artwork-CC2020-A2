<?php
session_start();

// Connect to the db server
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

// TODO: I have to figure out a way to update only specific data instead of the whole data
$query = "UPDATE users SET firstname = '{$_POST['firstname']}', 
        lastname = '{$_POST['lastname']}', sex = '{$_POST['sex']}', dob = '{$_POST['dob']}',   
        email = '{$_POST['email']}', phone = '{$_POST['phone']}', password = '{$_POST['confirmPassword']}'  
        WHERE username ='{$_SESSION['username']}'";


// Run an insert query
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

header("Location:view_profile.php");
exit(0);

?>
