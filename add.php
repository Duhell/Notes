<?php 

	include 'conn.php';
	include 'session.php';

	if (isset($_POST['submit'])) {
		$title = $_POST['title'];
		$content = $_POST['note'];
		$time;
		$userId = $_GET['id'];


		$sql = "INSERT INTO `note` (title,body_letter,Oras,user_id) values('$title','$content',Now(),'$userId')";

		$result = mysqli_query($conn,$sql);
		if ($result) {
			echo '<script>alert("Note Added")</script>';
			header("location: home.php?id={$_SESSION['id']}");
		}else{
			die("Conection Failed". $conn -> connect_error);
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Note</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h3 class="m-4">Notes</h3>

	<div class="container m-3">
		<form method="POST">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" placeholder="New title" class="form-control p-3" autocomplete="off">
			</div>
			<div class="form-group my-3">
				<label>Description</label>
				<textarea class="form-control p-3" name="note" placeholder="Description"></textarea>
			</div>
			<button type="submit" name="submit" class="btn btn-dark px-5">Add</button>
		</form>
	</div>
	
</body>
</html>