<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
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
      <h1 class="text-center">Main Page</h1>
    </div>

    <form method="post" action="process_login.php" class="login_form ">
      <h1 class="login_header">Login</h1>

      <div class="form-group">
        <label for="id">Username: </label>
        <input type="text" class="form-control" placeholder="Enter Username" name="id" required>
      </div>

      <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
      </div>

      <button type="submit" class="btn btn-default">Login</button>
    </form>
  </div>
</body>

</html>