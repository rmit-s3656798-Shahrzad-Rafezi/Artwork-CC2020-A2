<?php
session_start();
// check if session variable exist
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
  exit(0);
} else {
  // print "<p id='f'>Welcome {$_SESSION['username']}</p>";
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Profile</title>
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

    <?php
    include("nav.inc");
    ?>

    <form method="post" action="process_update_profile.php" class="update_form">

      <h1>Update</h1>

      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="firstname">First Name: </label>
          <input type="text" class="form-control" placeholder="Enter First Name" name="firstname">
        </div>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="lastname">Last Name: </label>
          <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
        </div>
      </div>

      <div class="form-group">
        <label for="sex">Gender: </label>

        <label class="radio-inline">
          <input type="radio" name="sex" value="female">Female
        </label>

        <label class="radio-inline">
          <input type="radio" name="sex" value="male">Male
        </label>

        <label class="radio-inline">
          <input type="radio" name="sex" value="other">Other
        </label>
      </div>

      <div class="form-group">
        <label for="dob">Date Of Birth: </label>
        <input type="date" class="form-control" placeholder="Enter your Birthday" name="dob">
      </div>

      <div class="form-group">
        <label for="email">Email: </label>
        <input type="text" class="form-control" placeholder="Enter email" name="email">
      </div>

      <div class="form-group">
        <label for="phone">Phone: </label>
        <input type="tel" class="form-control" placeholder="Enter phone number" name="phone">
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="password">Password: </label>
          <input type="password" class="form-control" placeholder="Enter Password" name="password">
        </div>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="confirmPassword">Confirm Password: </label>
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword">
        </div>
      </div>

      <button type="submit" class="btn btn-default update">Update</button>
    </form>
  </div>

</body>

</html>