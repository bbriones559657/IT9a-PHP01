<?php

session_start();

$error = "";

$remember = $_COOKIE['rememberUser'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (
        isset($_SESSION['registeredUser']) &&
        $username == $_SESSION['registeredUser'] &&
        $password == $_SESSION['registeredPass']
    ) {

        $_SESSION['user'] = $username;

        setcookie("rememberUser", $username, time() + 86400);
        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Wrong login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width:400px;">
            <h3 class="text-center mb-3">
                Login
            </h3>

            <!-- ERROR MESSAGE -->
            <?php if ($error): ?>
                <div class="alert alert-danger text-center">
                    <?= htmlspecialchars($error) ?>
                </div>

            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label"> Username </label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Password </label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100"> Login </button>
            </form>

            <div class="text-center mt-3">
                <a href="sign-up.php"> Create Account </a>
            </div>
        </div>
    </div>
</body>

</html>