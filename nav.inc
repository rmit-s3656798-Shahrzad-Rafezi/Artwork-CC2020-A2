        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="homepage.php">Artwork</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href=add_art.php>Add New Art</a></li>
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