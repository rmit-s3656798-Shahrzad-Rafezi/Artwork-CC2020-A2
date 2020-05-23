<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

session_start();


if (isset($_SESSION['username']) &&
	isset($_POST['title'])) {
		$username = $_SESSION['username'];
		$title = $_POST['title'];	
} else {
	header("Location:add_art.php");
	exit(0);
}
if (isset($_POST['category'])) {
	$category = $_POST['category'];
}
if (isset($_POST['description'])) {
	$description = $_POST['description'];
}

// AWS Info
$bucketName = 'artwork-cca2-2020';

// Connect to AWS
try {
    $s3 = new S3Client([
        // 'profile' => 'default',
        'region' => 'us-east-1',
        'version' => 'latest'
    ]);
} catch (Exception $e) {
	die("Error: " . $e->getMessage());
}

$keyName = 'uploads/' . basename($_FILES["image"]['name']);

// Example: https://artwork-cca2-2020.s3.amazonaws.com/uploads/SWITCH_strawberry.png
// TODO: figure out how to make every image public
$ImagePath = 'https://'. $bucketName .'.s3.amazonaws.com/'. $keyName;

// Add it to S3
try {
	// Uploaded:
	$file = $_FILES["image"]['tmp_name'];
	$s3->putObject(
		array(
			'ACL' => 'public-read-write',
			'Bucket' => $bucketName,
			'Key' =>  $keyName,
			'SourceFile' => $file,
		)
	);
} catch (S3Exception $e) {
	die('Error:' . $e->getMessage());
}


// This is for adding it to database	
$filename = $_FILES['image']['name'];

// Put data into database
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
	or die('Could not connect: ' . pg_last_error());

$query = "INSERT INTO artwork (title, description, imagename, s3pathfile, artist) VALUES('$title', '$description', '$filename', '$ImagePath', '$username')";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Redirect
header("Location:homepage.php");
exit(0);

?>