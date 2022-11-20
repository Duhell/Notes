<?php 

	include 'conn.php';

	if (isset($_POST['signup'])) {
		$user = $_POST['new-user'];
		$pass = $_POST['new-pass'];
		$repass = $_POST['new-pass-re'];

		if($pass != $repass){
			echo '<script>alert("Your password does not match!")</script>';
		}else{
			$sql = "INSERT INTO `users` (username,password) values('$user','$pass')";
			$result = mysqli_query($conn,$sql);
			if ($result) {
				echo '<script>alert("Successfully Created an Account.")</script>';
				header("location: index.php");
			}else{
				die("Conection Failed". $conn -> connect_error);
			}
		}		
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Account</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>

	<div class="main-login">
		<div class="login-container">
			<form action="addAcc.php" method="POST">
				<h3>Sign up</h3>
				<div class="user-input">
					<label>Username</label>
					<input type="text" name="new-user" autofocus autocomplete="OFF">
				</div>
				<div class="user-password">
					<label>Password</label>
					<input type="password" name="new-pass">
				</div>
				<div class="user-password">
					<label>Re-enter password</label>
					<input type="password" name="new-pass-re">
				</div>
				<input type="submit" name="signup" value="Create" id="btn" >
				<div class="new-account">
					<a href="index.php">Login </a>
				</div>
			</form>
		</div>
		
	</div>
	
</body>
</html>