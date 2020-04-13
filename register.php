<?php
# datastore connection here
session_start();

# redirection for logged in user here
if(isset($_SESSION["loggedin"])) {
  if ($_SESSION["loggedin"] == true) {
    header("location: /");
    exit;
  }
}
# redirection for logged in user above

?>
<div>
  <form action="/login" method="post">
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
