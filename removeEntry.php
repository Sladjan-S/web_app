<?php
require "connect.php";

if ($_POST['delPost']){
  $checkbox = $_POST['checkbox'];
  $countCheck = count($_POST['checkbox']);

  for ($i=0; $i<$countCheck; $i++){
    $del_id = $checkbox[$i];
    $query = "delete from posts where post_id = $del_id";
    $result = mysqli_query($con,$query);
  }
  if ($result){
    echo "Post deleted successfuly.";
  }else{
    echo "Error: ".mysqli_error();
  }
}
header("Location: del_post.php");
