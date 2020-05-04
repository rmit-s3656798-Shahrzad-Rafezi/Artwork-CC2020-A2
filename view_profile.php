<?php
session_start();
// check if session variable exist
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit(0);
} else {
    $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
        or die('Could not connect: ' . pg_last_error());

    $user_query = "SELECT * FROM users WHERE username ='{$_SESSION['username']}'";
    $user_result = pg_query($user_query) or die('Query failed: ' . pg_last_error());

    $art_query = "SELECT * FROM artwork WHERE artist ='{$_SESSION['username']}'";
    $art_result = pg_query($art_query) or die('Query failed: ' . pg_last_error());
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Profile</title>
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
                    <?php
                    if (!isset($_SESSION['username'])) {
                        print "<li><a href=register.php><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        print "<li><a href=login.php><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    } else {
                        print "<li><a href=view_profile.php><span class='glyphicon glyphicon-user'></span> Profile</a></li>";
                        print "<li><a href=logout.php><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <?php
                while ($row = pg_fetch_row($user_result)) {
                    print "<label>Name: </label>";
                    print "<p>{$row[1]} {$row[2]}</p>";

                    print "<label>Email: </label>";
                    print "<p>{$row[5]}</p>";

                    print "<label>Date Of Birth: </label>";
                    print "<p>{$row[6]}</p>";

                    print "<label>Phone Number: </label>";
                    print "<p>{$row[7]}</p>";
                }
                ?>
                <a href="update_profile.php" class="btn btn-info" role="button">Update Profile</a>
            </div>
        </div>

        <div class="row">
            <?php
            while ($row = pg_fetch_row($art_result)) {
                echo "<div class='col-sm-6 col-md-4'>";
                echo "<div class='card'>";
                //print "<a href='artwork.php?filename={$row[3]}'><img src='uploads/{$row[3]}'></a>";
                print "<a href='artwork.php?filename={$row[4]}'><img src='{$row[4]}'></a>";
                print "<h3>Title: {$row[1]}</h3>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>


    </div>
</body>

</html>