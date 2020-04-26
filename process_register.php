<?php
	if(isset($_POST['id'])){
        $username = $_POST['id'];
    }
        
	if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
        
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }

    if(isset($_POST['confirmPassword'])){
        $confirmPassword = $_POST['confirmPassword'];
    }

    // TODO: check if gender specs is set
        
	// TODO: connect to the db server

	// TODO: define the query

	// TODO: run an insert query

    // Redirect to home page
    header("Location:homepage.php");
    exit(0);
?>