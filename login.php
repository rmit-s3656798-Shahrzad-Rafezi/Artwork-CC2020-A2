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
    <label>LoginS</label>
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
