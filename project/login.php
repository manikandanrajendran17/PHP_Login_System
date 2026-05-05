<?php
session_start();

$savedName = $_COOKIE['remember_username'] ?? '';
$theme = $_COOKIE['user_theme'] ?? 'light';
$error = $_SESSION['error'] ?? '';

unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body class="<?php echo $theme; ?>">
    <div class="container mt-5 col-md-4">
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="auth.php">
            <input type="text" name="username" class="form-control mb-2" placeholder="Username" value="<?php echo $savedName; ?>">
            <input type="email" name="email" class="form-control mb-2" placeholder="Email">
            <input type="password" name="password" class="form-control mb-2" placeholder="Password">

            <label><input type="checkbox" name="remember"> Remember Me</label>
            <br><br>

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <p class="mt-3 text-center">
            user1 | user1@example.com | User@123 <br>
            user2 | user2@example.com | User@123
        </p>
    </div>
</body>
</html>
