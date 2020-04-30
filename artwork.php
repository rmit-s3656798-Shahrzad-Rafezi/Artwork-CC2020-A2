<?php
$db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
    or die('Could not connect: ' . pg_last_error());

$query = "select * from artwork where imagename ='{$_GET['filename']}'";

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
                        print "<li><a href=update.php><span class='glyphicon glyphicon-user'></span> Update Profile</a></li>";
                        print "<li><a href=logout.php><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <?php
                while ($row = pg_fetch_row($result)) {
                    print "<img src='uploads/{$row[3]}' class='responsive' />";
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