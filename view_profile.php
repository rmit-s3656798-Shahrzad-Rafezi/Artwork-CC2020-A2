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

    </div>
</body>

</html>