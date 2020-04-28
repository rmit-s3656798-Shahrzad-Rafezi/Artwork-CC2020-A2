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

<?php
// $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
// or die('Could not connect: ' . pg_last_error());

// $query = "select * from artwork";

// $result = pg_query($query) or die('Query failed: ' . pg_last_error());

// print "<div class='row'>";

// while ($row = pg_fetch_row($result)) {
//     echo "<div class='col-sm-6 col-md-4'>";
//     echo "<div class='card'>";
//     print "<a href='artwork.php?filename={$row['filename']}'><img src='uploads/{$row['filename']}'></a>";
//     echo "</div>";
//     echo "</div>";
// }

// print "</div>";
?>

<body>
    <div class="container d-flex align-items-center min-vh-100">

        <div class="jumbotron">
            <h1 class="text-center">Main Page</h1>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="module-6.jpg" />
                    <h3>Card 1</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <a href="www.google.com"><img src="module-6.jpg" /></a>
                    <h3>The logo for the club</h3>
                    <p>Artist: Sherry</p>
                    <p>Some text</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="module-6.jpg" />
                    <h3>Card 3</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="module-6.jpg" />
                    <h3>Card 1</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="module-6.jpg" />
                    <h3>The logo for the club</h3>
                    <p>Artist: Sherry</p>
                    <p>Some text</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="module-6.jpg" />
                    <h3>Card 3</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                </div>
            </div>

        </div>

    </div>
</body>

</html>