<?php
require "connect.php";
include "usr_authenticate.php";

if (isset($_POST['submit'])){
  $title = $_POST['title'];
  $body = $_POST['body'];
  $category = $_POST['category'];
  $title = $con->real_escape_string($title);
  $body = $con->real_escape_string($body);
  $body = htmlentities($body);

  $username = $_SESSION["username"];
  $date = date('Y-m_d G:i:s');

  $query = $con->query("INSERT INTO `posts`(user_name,title,body,category_id,posted) VALUES ('$username','$title','$body','$category','$date')");
  if ($query){
      echo "Posted successfully";
  }else{
      echo "Posting failed!";
  }

  }



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New Post</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" type="text/css" href="css/style.css" />

	<body>
    <?php
    include("header.php");
    if ($_SESSION['username']=='admin'){
      include "dashboard.php";
    }
    ?>
  <div id="newpost">
      <a href="index.php">Back To Main Page</a>
  <h1>NEW POST</h1>
      <form action="" method="post">
          <label for="title">Title:</label><br/>
          <input type="text" name="title" placeholder="Title..." required/><br/><br/>
          <label for="body">Body:</label><br/>
          <textarea name="body" cols="50" rows="10" placeholder="Text here.." required></textarea><br/>
          <label for="category">Category:</label><br/>
          <select name="category">
            <?php
            $query = $con->query("SELECT * FROM `categories`");
            while ($row = $query->fetch_object()){
              echo "<option value='".$row->category_id."'>".$row->category_name."</option>";
            }
            ?>
          </select><br/><br/>
          <input type="submit" name="submit" value="Submit post" />
      </form>
  </div>
	</body>
    <?php
    include("footer.php");
    ?>
</html>
