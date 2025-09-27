<?php
include("connection/dbcon.php");
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['remember_me'])) {
    setcookie("remember_me", "", time() - 3600, "/"); // Expire the cookie immediately
}

header("Location: index.php");
exit;

?>
