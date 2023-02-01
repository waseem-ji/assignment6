<?php
include "auth/functions.php";
// session_start();
if (isset($_SESSION['email'])) {
    header("Location:todo.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>My Todo App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/home-page.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Login</h2>
  <form id="login-form" action="login.php" method="post" >
    <p>
    <input type="email" id="email" name="email" placeholder="Email" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="password" id="password" name="password" placeholder="password" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input name="submit" type="submit" id="login" value="Login"> 
    </p>
  </form>
  
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
