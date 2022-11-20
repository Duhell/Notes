<?php 
	
	include 'conn.php';
	include 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Notes</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style>
		html, body{
			margin: 0;
			padding: 0;
			font-family: 'Poppins', sans-serif;
		}
		.main-home{
			min-height: 100vh;
			width: 100%;
			position: relative;
		}
		.all-notes{
			width: 92%;
			display: flex;
  			flex-wrap: wrap;
  			margin: 0 auto;
  			padding: 1em 0;
		}

		.note-container{
			word-break: break-word;
			background-color: #f1f1f1;
  			width: 18%;
			margin: 10px;
			padding: .9em;
			border: 1px solid #000;
			border-radius: 10px;
		}

		nav{
			width: 90%;
			padding: 1.3em;
			margin: 0 auto;
			display: flex;
			justify-content: space-between;
		}
		nav > span{
			font-size: 2rem;
			font-family: 'Poppins', sans-serif;
			font-weight: bold;
		}
		nav > a{
			text-decoration: none;
			font-size: 1.2rem;
			color: #000;
			transition: .3s ease-out;
		}
		nav > a:hover{
			color: red;
		}
		.bot-date-actions{
			width: 100%;
			
			display: flex;
			justify-content: space-between;
			font-size: 1rem;
		}
		.actions{
			width: 40%;
			display: flex;
			justify-content: space-between;
		}

		.actions > a{
			text-decoration: none;
			color: black;
		}
		.actions > a:hover{
			color: red;
		}

	</style>
</head>
<body>

	<div class="main-home">
		<nav>
			<span>Notes</span>
			<a href="logout.php">Log out</a>
		</nav>
		<a href="add.php?id=<?php echo $_SESSION['id'] ?>" id="add" style="margin-left: 70px; padding:.5em 1.9em; background: #202530; text-decoration:none;color: #fff;font-weight:bold; border-radius:5px">Add</a>
		<div class="all-notes">
			<?php
				$uId = $_GET['id'];
				$sql = "SELECT * FROM note INNER JOIN users ON note.user_id=users.user_id WHERE users.user_id = '$uId'";
				$result = mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_array()) {
						$timeStamp = $row['Oras'];

			?>
			<div class="note-container">

				<div id="title"><span><?php echo $row['title'];?></span></div><hr>
				<div id="description"><p><?php echo $row['body_letter'];?></p></div><hr>
				<div class="bot-date-actions">
					<span><?php echo date('M-d-Y',strtotime($timeStamp)); ?></span>
					<div class="actions">
						<a href="edit.php?noteId=<?php echo $row['note_id']?>">Edit</a>
						<a href="delete.php?noteId=<?php echo $row['note_id']?>">Delete</a>
					</div>
				</div>
			</div>
		<?php }
			}else{
				echo '<p style="position:absolute; top:50%;left:50%;transform:translate(-50%,-50%);">No note available</p>';
			}$conn->close();
		?>
		</div>
	</div>
	
</body>
</html>