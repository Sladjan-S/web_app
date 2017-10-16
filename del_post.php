<?php
require "connect.php";
include "usr_authenticate.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Page</title>
  <meta charset="UTF-8">
  <meta name=description content="">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </style>
</head>
<?php
include("header.php");
?>
<body>
<?php
if ($_SESSION['username']=='admin'){
  include "dashboard.php";
}
?>
<?php
$query = "SELECT * FROM posts order by posted desc";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result)){
?>
<div>
  <form method="post" action="removeEntry.php">
    <div id="postd">
      <input type="checkbox" name="checkbox[]" id="checkbox"
                value="<?php echo $row['post_id']; ?>">
      <p><?php echo $row['body']; ?></p>
      <b>Posted on:</b><?php echo $row['posted']; ?>
    </div>
    <?php
    }
    }else{
      echo " No entries";
    }
    ?>
  </form>
  <input type="submit" name="delPost" value="Delete Checked Post(s)" class="button" />
    <a href="index.php">Back To Main Page</a>
</div>
</body>
<?php
include("footer.php");
?>
</html>
