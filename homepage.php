<?php
session_start();
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
            <h1 class="text-center">Art Work</h1>
        </div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href=homepage.php>Home</a></li>
                    <li><a href=add_art.php>Add New Art</a></li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=register.php><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        print "<li><a href=login.php><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    } else {
                        print "<li><a href=logout.php><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

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

        <footer>
            <p>&copy;Shahrzad Rafezi</p>
        </footer>

    </div>
</body>

</html>