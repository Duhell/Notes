<?php

	include 'conn.php';
	include 'session.php';

	$id = $_GET['noteId'];
	$sql = "DELETE FROM note WHERE note_id = '$id'";

	if ($conn->query($sql) === true) {
		echo "<script>alert('Success Delete!')</script>";
		header("location: home.php?id={$_SESSION['id']}");
		
	}else{
		echo '<script>alert("Unable to delete record")</script>';
	}