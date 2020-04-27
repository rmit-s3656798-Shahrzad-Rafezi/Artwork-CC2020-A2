<?php
session_start();
// check if session variable exist
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit(0);
} else {
    print "<p id='f'>Welcome {$_SESSION['username']}</p>";
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Art Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container d-flex align-items-center min-vh-100">

        <h1>Add your artwork</h1>

        <form method="post" action="process_add_art.php" enctype=multipart/form-data>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" />
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" name="category" />
            </div>

            <div class="form-group">
                <label>Description</label><br>
                <td><textarea rows=10 cols=50 class="form-control" name=description></textarea><br></td>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image" />
            </div>

            <button type="submit" class="btn btn-default">Add Art</button>
        </form>
        
    </div>
</body>

</html>