<?php
include ('connect.php');
session_start();
$username = $_SESSION['username'];
if (!isset($_GET['id'])){
  header('Location: index.php');
  exit();
}else{
  $id = $_GET['id'];
}
if (!is_numeric($id)){
  header('Location: index.php');
  exit();
}
$sql = "SELECT title,body FROM posts WHERE post_id='$id'";
$query = $con->query($sql);

if ($query->num_rows!=1){
  header('Location: index.php');
  exit();
}


if (isset($_POST['submit'])){
  $comment = htmlspecialchars($_POST['comment']);
  $comment = $con->real_escape_string($comment);
  $comment_sql = $con->query("INSERT INTO comments(post_id,username,comment)VALUES('$id','$username','$comment')");
  if (!$comment_sql){
    echo "Commenting failed..";
  }else{
    echo "Comment success!";
  }

}




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Post page</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

                <link rel="stylesheet" type="text/css" href="css/style.css" />



	</head>
    <?php
    include("header.php");
    ?>
  <body>
  <a href="index.php">GO BACK</a>
    <div>
        <div id="post">
          <?php
            $row = $query->fetch_assoc();
            echo "<h2>".$row['title']."</h2>";
            echo "<p>".$row['body']."</p>";

          ?>
        </div>
      <div id="comments">
          <?php
            $showCommentQuery =$con->query("SELECT * FROM comments WHERE post_id = '$id' ORDER BY comment_id ASC");
            while($row = $showCommentQuery->fetch_assoc()):
          ?>

                <form method="post" action="del_comm.php">
                    <div>
                       <span><input type="checkbox" name="checkbox[]" id="checkbox"  value="<?php echo $row['comment_id'];?>"
                       <?php
                         if ($_SESSION['username'] != 'admin' && $_SESSION['username']!= $row['username']){
                           ?>
                            disabled
                                <?php
                         }?>>

                        <h3><?php echo $row['username']; ?></h3></span>
                        <blockquote><?php echo $row['comment'];?></blockquote>
                    </div>
                  <?php endwhile;?>
                </form>
      </div>
        <hr/>
        <input type="submit" name="delComm" value="Delete Checked Comment(s)" style="float: right;"/>


      <div id="comment">
        <form method="post" action="">
            <label style="display: block">Add new comment here: </label>
          <textarea name="comment" style="width:300px;height: 200px;padding: 5px;margin: auto; "></textarea>
          <p><input type="submit" name="submit" value="Add Your Comment!"/></p>
        </form>
      </div>

    </div>
  </body>
    <?php
    include("footer.php");
    ?>
</html>
