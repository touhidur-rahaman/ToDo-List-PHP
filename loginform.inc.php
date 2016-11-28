<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if (!empty($username) && (!empty($password))) {
		$query= "SELECT id FROM users WHERE user_name = '$username' AND password='$password' "; 
		
		if ($query_run= mysqli_query($con,$query)) {
			$query_num_rows= mysqli_num_rows($query_run);

			
			if($query_num_rows==0){
				echo "invalid username or password...";
			
			}elseif($query_num_rows==1){
				$user_id_arr=mysqli_fetch_row($query_run);
				$user_id=$user_id_arr[0];

				$_SESSION['user_id']=$user_id;
				header('Location: index.php');
			}
			
		}else{
			echo "Username and password missmatch";
		}
	
	}else{
		echo "Put your usernaem or password";
	}
}

?>

<form action="<?php echo $current_file; ?>" method="POST">
	Username: <input type="text" name="username">
	Password: <input type="password" name="password">
	<input type="submit" name="submit" value="login"><br><br>
	<a href="register.php">Register</a>
</form>