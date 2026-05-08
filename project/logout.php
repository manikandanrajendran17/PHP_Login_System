<?php
session_start();

session_unset();
session_destroy();

setcookie("user_theme", "", time() - 3600, "/");

header("Location: login.php");
exit();
?>
