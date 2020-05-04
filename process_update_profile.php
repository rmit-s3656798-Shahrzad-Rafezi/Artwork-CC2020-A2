<?php

session_start();

$username = $_POST['id'];
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$sex = $_POST['sex'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Connect to the db server
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

// Define the query
$query = "select * from users where username = '$username' and password = '$password'";

// Run an insert query
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

?>
