<?php
session_start();

$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

$get_artwork_query = "SELECT * FROM artwork WHERE imagename ='{$_GET['filename']}'";
$get_artwork_result = pg_query($get_artwork_query) or die('Query failed: ' . pg_last_error());

// Gets the artwork id for displaying the comments and likes
$artwork_id_query = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result = pg_query($artwork_id_query) or die('Query failed: ' . pg_last_error());

// Displays comments 
while ($row = pg_fetch_row($artwork_id_result)) {
    $comments_query = "SELECT * FROM comments WHERE artwork_id = {$row[0]}";
    $comments = pg_query($comments_query) or die('Query failed: ' . pg_last_error());
}

$artwork_id_query1 = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result1 = pg_query($artwork_id_query1) or die('Query failed: ' . pg_last_error());

// Add Comments
$comment_text = $_POST['comment_text'];
$username = $_SESSION['username'];

if (isset($comment_text)) {
    while ($row = pg_fetch_row($artwork_id_result1)) {
        $artwork_id = (int) $row[0];
        $query = "INSERT INTO comments(username, artwork_id, comment) VALUES ('$username', '$artwork_id', '$comment_text')";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    }
}

$artwork_id_query2 = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result2 = pg_query($artwork_id_query2) or die('Query failed: ' . pg_last_error());

// Display likes
while ($row = pg_fetch_row($artwork_id_result2)) {
    $likes_query = "SELECT COUNT(username) as total FROM likes WHERE artwork = {$row[0]}";
    $likes = pg_query($likes_query) or die('Query failed: ' . pg_last_error());
}

// Add Likes
$artwork_id_query3 = "SELECT id FROM artwork WHERE imagename ='{$_GET['filename']}'";
$artwork_id_result3 = pg_query($artwork_id_query3) or die('Query failed: ' . pg_last_error());

if (array_key_exists('like_button', $_POST)) {
    while ($row = pg_fetch_row($artwork_id_result3)) {
        $artwork_id = (int) $row[0];
        $add_like = "INSERT INTO likes (username, artwork) VALUES ('$username', '$artwork_id')";
        $add_like_result = pg_query($add_like) or die('Query failed: ' . pg_last_error());
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
                print "<img src='{$artwork[4]}' class='responsive' />"; //gets the image
                print "<p>Description: {$artwork[2]}</p>"; //gets the description
            }
            ?>
            <div class="display_likes">
                <form method="post">
                    <input class="btn btn-info btn-lg" id='like_button' type='submit' name='like_button' value='Like' />
                </form>

                <?php
                while ($like = pg_fetch_row($likes)) {
                    print " <p class='number_of_likes'>{$like[0]}</p>";
                }
                ?>
            </div>
            <!-- <a href="#" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
            </a>
            <p class="number_of_likes">5</p> -->
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <form method="post">
                <textarea name="comment_text" id="comment_text" class="form-control" cols="3" rows="3" style="margin-bottom: 5px"></textarea>
                <button class="btn btn-info btn-lg">Submit comment</button>
            </form>
            <div id="comments-wrapper">
                <?php
                while ($comment = pg_fetch_row($comments)) {
                    echo "<div class='comment'>";
                    print "<h5>{$comment[1]}</h5>"; // gets the username
                    print "<p>{$comment[3]}</p>"; // gets the comment
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>