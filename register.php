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
          <label for="firstname">First Name: </label>
          <input type="text" placeholder="Enter First Name" name="firstname">
        </div>
        <div>
          <label for="lastname">Last Name: </label>
          <input type="text" placeholder="Enter Last Name" name="lastname">
        </div>
        <div>
          <label for="sex">Gender: </label>
          <input type="radio" name="sex" value="female">Female
          <input type="radio" name="sex" value="male">Male
          <input type="radio" name="sex" value="other">Other
        </div>
        <div>
          <label for="dob">Date Of Birth: </label>
          <input type="date" placeholder="Enter your Birthday" name="dob">
        </div>
        <div>
          <label for="email">Email: </label>
          <input type="text" placeholder="Enter email" name="email" required>
        </div>
        <div>
          <label for="phone">Phone: </label>
          <input type="tel" placeholder="Enter phone number" name="phone" required>
        </div>
        <div>
          <label for="password">Password: </label>
          <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div>
          <label for="confirmPassword">Confirm Password: </label>
          <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </body>

</html>