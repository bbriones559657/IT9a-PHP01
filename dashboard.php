<?php

session_start();

// PROTECT PAGE (LOGIN REQUIRED)
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();

}

$username = $_SESSION['user'];

?>
!
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand"> Dashboard </span>
            <a href="logout.php" class="btn btn-light btn-sm"> Logout </a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="mb-3">
                Welcome,
                <?= htmlspecialchars($username) ?> 👋
            </h3>
            <p> You are successfully logged in. </p>
        </div>
    </div>
</body>

</html>