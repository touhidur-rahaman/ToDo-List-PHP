<?php  
	
require 'core.inc.php';
require 'connect.inc.php';

if(!loggedin()){
	if (isset($_POST['username']) && 
		isset($_POST['password']) &&
		isset($_POST['password_again']) &&
		isset($_POST['firstname'])&&
		isset($_POST['lastname'])) {
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_again=$_POST['password_again'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];

			if (!empty($username) && !empty($password)&& !empty($password_again) && !empty($firstname) && !empty($lastname)) {
				if ($password!=$password_again) {
					echo 'password missmatch!!!';
				}else{
					$query= "SELECT user_name FROM users WHERE user_name='$username' ";
					$query_run= mysqli_query($con,$query);

					if (mysqli_num_rows($query_run)==1) {
						echo 'username '.$username .'already exists.';
					}else{
						$query= "INSERT INTO users VALUES ('','$username', '$password' ,'$firstname','$lastname')";
						if($query_run=mysqli_query($con,$query)){
							header('Location: req_seccess.php');
						}else{
							echo "sorry...";
						}
					}

				}
			}else{
				echo "all fields are required...";
			}
	}
?>
<form action="register.php" method="POST">
	Username: <input type="text" name="username" value="<?php 
	if(!empty($username))
		echo $username ; 
	?> "><br>
	Password: <input type="password" name="password"  ><br>
	Password again: <input type="password" name="password_again" ><br>
	Firstname: <input type="text" name="firstname" value="<?php if(!empty($firstname))
	echo $firstname ; ?> "> <br>
	Lstname: <input type="text" name="lastname" value="<?php if(!empty($lastname))
	echo $lastname ; ?> " ><br>

	<input type="submit" name="submit" value="register">
</form>

<?php	
}elseif (loggedin()) {
	echo 'Already loggedin.....';
}

?>