<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Update Page</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div>
    <form method="post" action="process_update.php">
      <label>Update</label>
      <div>
        <label for="id">Username: </label>
        <input type="text" placeholder="Enter Username" name="id">
      </div>
      <div>
        <label for="password">Password: </label>
        <input type="password" placeholder="Enter Password" name="password">
      </div>
      <div>
        <label for="confirmPassword">Confirm Password: </label>
        <input type="password" placeholder="Confirm Password" name="confirmPassword">
      </div>
      <div>
        <label for="gender">Gender: </label>
        <select name="gender">
          <option value="f">Female</option>
          <option value="m">Male</option>
          <option value="x">Other / Prefer not to say</option>
        </select>
      </div>
      <button type="submit">Update</button>
    </form>
  </div>

</body>

</html>