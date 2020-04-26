<?php
# datastore connection here
session_start();

# redirection for logged in user here
if (isset($_SESSION["loggedin"])) {
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