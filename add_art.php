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
    <title>Add Art Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <h2>Add your artwork</h2>
    <form method="post" action="process_add_art.php" enctype=multipart/form-data> <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" /></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><input type="text" name="category" /></td>
        </tr>
        <tr>
            <td>Description</td><br>
            <td><textarea rows=10 cols=50 name=description></textarea><br></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td><input type="submit" /></td>
        </tr>
        </table>
    </form>

</body>

</html>