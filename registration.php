<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
          <style>
              <link rel="stylesheet" type="text/css" href="css/style.css" />
          </style>

</head>
<body>
<?php
require('connect.php');
if (isset($_REQUEST['username'])){

  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($con,$username);
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con,$email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con,$password);
  $role = 'user';
  $query = "INSERT into `users` (user_name, password, email,role)
VALUES ('$username', '".md5($password)."', '$email','$role')";
  $result = mysqli_query($con,$query);
  if($result){
    echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a class='link' href='index.php'>Login</a></div>";
  }
}else{
  ?>
    <div id="registration" >
        <h2>Registration</h2>
        <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="USERNAME" required />
                <input type="email" name="email" placeholder="EMAIL" required />
                <input type="password" name="password" placeholder="PASSWORD" required />
                <input type="submit" name="submit" value="Register" class="button"/>
        </form>
        <p>Already registered? <a href='login.php'>Login Here</a></p>
    </div>
<?php } ?>
</body>
</html>