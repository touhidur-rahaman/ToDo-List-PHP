<?php
ob_start();
session_start();
$current_file= $_SERVER['SCRIPT_NAME'];
//$http_referer= strval(isset($_SERVER['HTTP_REFERER']));
if(isset($_SERVER['HTTP_REFERER'])) {
  $http_referer= $_SERVER['HTTP_REFERER']; 
   }
else
{
   $http_referer= 'index.php'; 
} 

function loggedin(){
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		return true;
	}else{
		return false;
	}
}

function getField($con,$field){
	//echo $_SESSION['user_id'];
	//echo $field;

	$query= "SELECT $field FROM users WHERE id='".$_SESSION['user_id']."'";
	if($query_run=mysqli_query($con,$query)){
		//$arr= mysqli_fetch_array($query_run,MYSQLI_ASSOC);
		//return $arr;
		$user_field_arr=mysqli_fetch_row($query_run);
		$user_field=$user_field_arr[0];
		return($user_field);
	}
}
?>