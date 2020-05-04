<?php
    session_start();
    // TODO: check to see if the input is not empty 
	$username = $_POST['id'];
	$password = $_POST['password'];

    // Connect to the db server
    $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

    // Define the query
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Run an insert query
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    

    // Check to see if that user exist in database
    if(pg_num_rows($result) > 0) {
        while ($row = pg_fetch_row($result)){

            if($row[0] == $username && $row[4] == $password){
                $_SESSION['username'] = $username;
                header("Location:homepage.php");
                exit(0);
            }
            // NOTE: This is not working yet, I'll have to look into it
            else if ($row[0] != $username && $row[4] != $password){
                print"<h3>The Username and Password is incorrect</h3>";
            }
        }
    }
    else {
        print"<h3>You are not registered</h3>";
    }

?>