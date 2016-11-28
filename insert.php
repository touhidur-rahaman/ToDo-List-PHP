<?php 
require 'core.inc.php';
require 'connect.inc.php';
$userid=getfield($con,'id');

if(isset($_POST['titel']) && $_POST['description']){
	$titel=$_POST['titel'];
	$description=$_POST['description'];
	if(!empty($titel) ){
	$query= "INSERT INTO todos VALUES ('', '$userid','$titel','$description') ";
	$result=mysqli_query($con,$query) or die("ERROR");
	header("Location: index.php");

}else{
	echo 'fill up titel field';
}
}
?>


<form action="insert.php" method="POST">
	Titel: <input type="text" name="titel">
	Description: <input type="text" name="description">
	<input type="submit" name="sub" value="Submit">
</form>