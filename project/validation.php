<?php
function validateLogin($username, $email, $password)
{
    if (empty($username)) {
        return "Username required";
    }

    if (strlen($username) < 3) {
        return "Username too short";
    }

    if (empty($email)) {
        return "Email required";
    }

    if (strpos($email, "@") === false) {
        return "Invalid email";
    }

    if (empty($password)) {
        return "Password required";
    }

    if (strlen($password) < 6) {
        return "Password too short";
    }

    return "";
}
?>
