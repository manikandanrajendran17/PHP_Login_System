<?php
session_start();
include 'validation.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']);

$error = validateLogin($username, $email, $password);

if ($error) {
    $_SESSION['error'] = $error;
    header("Location: login.php");
    exit();
}

$users = [
    "user1" => ["email" => "user1@example.com", "password" => "User@123", "theme" => "dark"],
    "user2" => ["email" => "user2@example.com", "password" => "User@123", "theme" => "warm"]
];

if (isset($users[$username])) {
    $user = $users[$username];

    if ($email === $user['email'] && $password === $user['password']) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['theme'] = $user['theme'];

        if ($remember) {
            setcookie("remember_username", $username, time() + 60, "/");
        }

        setcookie("user_theme", $user['theme'], time() + 60, "/");

        header("Location: dashboard.php");
        exit();
    }
}

$_SESSION['error'] = "Wrong credentials!";
header("Location: login.php");
exit();
?>
