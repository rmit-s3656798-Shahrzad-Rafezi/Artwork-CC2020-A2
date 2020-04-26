<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
    <div>
      <form method="post" action="process_register.php">
        <label>Register</label>
        <div>
          <label for="id">Username: </label>
          <input type="text" placeholder="Enter Username" name="id" required>
        </div>
        <div>
          <label for="email">Email: </label>
          <input type="text" placeholder="Enter email" name="email" required>
        </div>
        <div>
          <label for="password">Password: </label>
          <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div>
          <label for="confirmPassword">Confirm Password: </label>
          <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
        </div>
        <div>
          <label for="gender">Gender: </label>
          <select name="gender">
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="x">Other / Prefer not to say</option>
          </select>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </body>

</html>