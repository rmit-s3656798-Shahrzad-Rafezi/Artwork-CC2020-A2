<?php
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

$query = "select * from artwork where imagename ='{$_GET['filename']}'";
//$query = "select * from artwork where s3pathfile ='{$_GET['filename']}'";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

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
                while ($row = pg_fetch_row($result)) {
                    //print "<img src='uploads/{$row[3]}' class='responsive' />";
                    print "<img src='{$row[4]}' class='responsive' />";
                    print "<p>{$row[2]}</p>";
                }
            ?>
            <a href="#" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
            </a>

            <p class="number_of_likes">5</p>
        </div>

        <!-- <div class="col-xs-6 col-sm-6 col-md-6">
            <img src="module-6.jpg" alt="" class="responsive">

            <a href="#" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
            </a>

            <p class="number_of_likes">5</p>
        </div> -->

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="comment">
                <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                <p>Oh wow I love your art work</p>
                <span class="time-right">11:00</span>
            </div>
            <div class="comment">
                <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                <p>This is truly amazing</p>
                <span class="time-right">12:00</span>
            </div>
        </div>



    </div>

</body>

</html>