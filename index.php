<?php
	include 'conn.php';
	session_start();
	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
		$result = mysqli_query($conn,$sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['uname'] = $row['username'];
			}
			header("location: home.php?id={$_SESSION['id']}");
		}else{
		?>
			<script type="text/javascript">alert('Invalid username or password!')</script>	
		<?php
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secret Notes</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<h4>NOTES</h4>

	<div class="main-login">
		<div class="login-container">
			<form action="index.php" method="POST">
				<h3>Login</h3>
				<div class="user-input">
					<label>Username</label>
					<input type="text" name="user" autofocus autocomplete="OFF">
				</div>
				<div class="user-password">
					<label>Password</label>
					<input type="password" name="pass">
				</div>
				<input type="submit" name="login" value="Login" id="btn" >
			</form>
			<div class="new-account">
				<a href="addAcc.php">Create Account</a>
			</div>
		</div>
		
	</div>
	
</body>
</html>