<?php
# datastore connection here
session_start();

# redirection for logged in user here
if(isset($_SESSION["loggedin"])) {
  if ($_SESSION["loggedin"] != true) {
    header("location: /login");
    exit;
  }
} else {
  header("location: /login");
  exit;
}
# redirection for logged in user above

?>
<div>
  <form action="/login" method="post">
    <label>Register</label>
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
