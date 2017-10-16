<?php


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <style>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </style>
    <script>
        function openNav(){
            document.getElementById('iSidenav').style.width = "250px";
        }
        function closeNav(){
            document.getElementById('iSidenav').style.width = "0";
        }
        /*MENU ICON*/

    </script>
</head>
<body>
<div id="iSidenav" class="sidenav">
    <a href="javascript:void(0)"class="closebtn" onclick="closeNav()">&times; </a>
    <a href="new_post.php">New Post</a>
    <a href="del_post.php">Delete Post</a>
</div>

<div id="menuicon" onclick="openNav()" >
    <p>Welcome to Dasboard <?php echo $_SESSION['username']; ?>!</p>
    <div id="menubar"></div>
    <div id="menubar"></div>
    <div id="menubar"></div>
</div>
</body>
</html>