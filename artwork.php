<?php
session_start();

$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

$get_artwork_query = "SELECT * FROM artwork WHERE imagename ='{$_GET['filename']}'";
$get_artwork_result = pg_query($get_artwork_query) or die('Query failed: ' . pg_last_error());

// Gets the artwork id for displaying the comments
$artwork_id_query = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result = pg_query($artwork_id_query) or die('Query failed: ' . pg_last_error());

// Displays comments
while ($row = pg_fetch_row($artwork_id_result)) {
    $comments_query = "SELECT * FROM comments WHERE artwork_id = {$row[0]}";
    $comments = pg_query($comments_query) or die('Query failed: ' . pg_last_error());
}

$artwork_id_query1 = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result1 = pg_query($artwork_id_query1) or die('Query failed: ' . pg_last_error());

$comment_text = $_POST['comment_text'];
$username = $_SESSION['username'];

if(isset($comment_text)){
    while ($row = pg_fetch_row($artwork_id_result1)) {
        $artwork_id = (int) $row[0];
        $query = "INSERT INTO comments (username, artwork_id, comment) VALUES ('$username', '$artwork_id', '$comment_text')";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    }
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artwork Page</title>
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
        <div class="jumbotron">
            <h1 class="text-center">Art Work</h1>
        </div>

        <?php include("nav.inc"); ?>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <?php
            while ($artwork = pg_fetch_row($get_artwork_result)) {
                //print "<img src='uploads/{$row[3]}' class='responsive' />";
                print "<img src='{$artwork[4]}' class='responsive' />";
                print "<p>{$artwork[2]}</p>";
            }
            ?>
            <a href="#" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
            </a>

            <p class="number_of_likes">5</p>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <form method="post" id="comment_form">
                <textarea name="comment_text" id="comment_text" class="form-control" cols="3" rows="3" style="margin-bottom: 5px"></textarea>
                <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
            </form>

            <?php
            while ($comment = pg_fetch_row($comments)) {
                echo "<div class='comment'>";
                print "<h5>{$comment[1]}</h5>";
                print "<p>{$comment[3]}</p>";
                echo "</div>";
            }
            ?>

            <!-- <div class="comment" style="margin-top: 40px">
                <h5>Mark Dang</h5>
                <p>Oh wow I love your art work</p>
                <span class="time-right">11:00</span>
            </div>
            <div class="comment">
                <h5>Gemma Ruse</h5>
                <p>This is truly amazing</p>
                <span class="time-right">12:00</span>
            </div> -->
        </div>

    </div>
    <!-- <script src="scripts.js"></script> -->
</body>

</html>