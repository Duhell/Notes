<?php 
	include 'conn.php';
	include 'session.php';

	$queryId = $_GET['noteId'];
	$sql = "SELECT * FROM note WHERE note_id = '$queryId'";
	$result = mysqli_query($conn,$sql);
	$field = $result->fetch_assoc();

	if (isset($_POST['update'])) {
		$title = $_POST['title'];
		$letter = $_POST['note'];
		$sql = "UPDATE note SET title='$title',body_letter = '$letter' WHERE user_id = '{$_SESSION['id']}'";
		$result = mysqli_query($conn,$sql);

		if ($result) {
			header("location: home.php?id={$_SESSION['id']}");
		}else{
			echo "Unable to update note due to ff. error".$conn->error;
		}
		$conn->close();
	}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Note</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h3 class="m-4">Edit Note</h3>

	<div class="container m-3">
		<form method="POST">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" placeholder="New title" class="form-control p-3" autocomplete="off"value="<?php echo $field['title'] ?>">
			</div>
			<div class="form-group my-3">
				<label>Description</label>
				<textarea class="form-control p-3" name="note" placeholder="Description"><?php echo $field['body_letter'] ?></textarea>
			</div>
			<button type="submit" name="update" class="btn btn-dark px-5">Update</button>
		</form>
	</div>
	
</body>
</html>