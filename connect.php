<?php
define('server','localhost');
define('username','root');
define('password','');
define('db','web_app');

$con = new mysqli(server,username,password,db);

if ($con->connect_errno){
  die("Failed to connect: ".$con->connect_error);
}

