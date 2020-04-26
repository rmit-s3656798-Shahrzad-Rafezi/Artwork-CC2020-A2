<!doctype html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Login Page</title>
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div>
      <form method="post" action="process_login.php">
        <label>Login</label>
        <div>
          <label for="id">Username: </label>
          <input type="text" placeholder="Enter Username" name="id" required>
        </div>
        <div>
          <label for="password">Password: </label>
          <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>

