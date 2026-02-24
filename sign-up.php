<?php

session_start();

$errors=[];
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=trim($_POST['username']??'');
$email=trim($_POST['email']??'');
$password=trim($_POST['password']??'');

if(empty($username)||empty($email)||empty($password)){
$errors[]="All fields required.";
}

if(strpos($username," ")!==false){
$errors[]="No spaces allowed.";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors[]="Invalid email.";
}

if(empty($errors)){

// save demo user
$_SESSION['registeredUser']=$username;
$_SESSION['registeredPass']=$password;

echo "Signup Successful <a href='login.php'>Login</a>";

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width:400px;">
      <h3 class="text-center mb-3">
        Signup
      </h3>

      <!-- SUCCESS MESSAGE -->
      <?php if ($success): ?>
        <div class="alert alert-success text-center">
          <?= $success ?>
          <br>
          <a href="login.php" class="btn btn-success btn-sm mt-2">
            Go To Login
          </a>
        </div>

      <?php endif; ?>

      <!-- ERROR MESSAGE -->
      <?php foreach ($errors as $e): ?>
        <div class="alert alert-danger">
          <?= htmlspecialchars($e) ?>
        </div>
      <?php endforeach; ?>


      <form method="POST">
        <div class="mb-3">
          <label class="form-label"> Username </label>
          <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label"> Email </label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label"> Password </label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100"> Sign Up </button>
      </form>

    </div>

  </div>

</body>
</html>

<?php
foreach($errors as $e){
echo "<p style='color:red'>$e</p>";
}
?>