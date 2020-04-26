<?php
    // TODO: Be able  to check if the input is not empty and make some fields required
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
    // TODO: Find a way to not display the host and the password in here
    $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
        or die('Could not connect: ' . pg_last_error());

    // Define the query
    // TODO: Find a way to make the password secure
    $query = "insert into users values('$username', '$first_name ', '$last_name', '$sex', '$password', '$email', '$dob', '$phone')";

    // Run an insert query
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    // Redirect to home page
    header("Location:homepage.php");
    exit(0);
?>