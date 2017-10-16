<?php
require "connect.php";


if ($_POST['delComm']){
  $checkbox = $_POST['checkbox'];
  $countCheck = count($_POST['checkbox']);

  for ($i=0; $i<$countCheck; $i++){
    $del_id = $checkbox[$i];
    $query = "delete from comments where comment_id = $del_id";
    $result = mysqli_query($con,$query);
  }
  if ($result){
    echo "<p>Comment deleted successfuly.</p>";
  }else{
    echo "<p>Error: ".mysqli_error()."</p>";
  }
}
header("Location: post.php");
