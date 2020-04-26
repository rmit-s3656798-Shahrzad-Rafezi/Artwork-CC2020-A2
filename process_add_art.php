<?php
    session_start();
	if(isset($_SESSION['username'])) $username = $_SESSION['username'];
    if(isset($_POST['title'])) $title = $_POST['title'];
	if(isset($_POST['category'])) $category = $_POST['category'];
	if(isset($_POST['description'])) $description = $_POST['description'];
	
	
	$filename = $_FILES['image']['name'];   
	$location = $_FILES['image']['tmp_name'];
	
    // move the file
    // TODO: CREATE S3 Storage
	move_uploaded_file($location, "uploads/$filename");
	
	// put data into database
    $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
        or die('Could not connect: ' . pg_last_error());

        $query = "insert into artwork values(null, '$title', '$description', '$filename', '$username')";
        
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		
	//redirect
	header("Location:homepage.php");
	exit(0);
?>