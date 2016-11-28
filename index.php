<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>todo list</title>

</head>

<body>

<?php
require 'core.inc.php';
require 'connect.inc.php';

if (loggedin()) { //It is a function from core.inc.php
	echo 'you are logged in ';
	echo getField($con,'user_name');  //It is a function from core.inc.php 
	echo '<a href="logout.php">Log Out </a>';
	$user_id=getField($con,'id');
	include 'todolist.php';
}else{
include 'loginform.inc.php';
}



?>