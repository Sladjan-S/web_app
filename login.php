<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
<?php
require('connect.php');
session_start();
#isto kao registracija,filtriranje ulaznih podataka
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($con,$username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con,$password);


  $query = "SELECT * FROM `users` WHERE user_name='$username'and password='".md5($password)."'";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $_SESSION['username'] = $username;
    header("Location: index.php");
  }else{
    echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
  }
}else{
  ?>
    <div class="form">
        <h1>Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="USERNAME" required />
            <input type="password" name="password" placeholder="PASSWORD" required />
            <input name="submit" type="submit" value="Login" />
        </form>
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>
<?php } ?>
</body>
</html>