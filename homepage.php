<?php
session_start();
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

$query = "SELECT * FROM artwork";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
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
            <h1 class="text-center">Welcome!</h1>
        </div>

        <?php include("nav.inc");?>

        <div class="row">
            <?php
            while ($row = pg_fetch_row($result)) {
                echo "<div class='col-sm-6 col-md-4'>";
                echo "<div class='card'>";
                print "<a href='artwork.php?filename={$row[3]}'><img src='{$row[4]}'></a>";
                print "<h3>Title: {$row[1]}</h3>";
                print "<p>Artist: {$row[5]}</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <footer>
            <p>&copy;Shahrzad Rafezi</p>
        </footer>

    </div>
</body>

</html>