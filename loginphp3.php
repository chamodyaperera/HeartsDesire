<?php
session_start();

 	
	
	$conn = mysqli_connect('localhost', 'root', '', 'hearts desire');
		// REGISTER USER
		if (isset($_POST['sign'])) {
		  // receive all input values from the form
		$Email = mysqli_real_escape_string($conn, $_POST['Email']);
		$Password = mysqli_real_escape_string($conn, $_POST['Password']);
		
	
	
	
   // $file = addslashes(file_get_contents($_FILES[$Image]["tmp_name"]));
	

  	$query = "SELECT 'Email', 'Password' FROM user_detail WHERE 'Email' = ? and 'Password' = ?";
	
	$stmt = $conn->prepare($query);
      $stmt->bind_param("ss",$Email,$Password);
      $stmt->execute();
	  
	$stmt->bind_result($Email, $Password);echo("d");
	if ($stmt->fetch()) {
		header('Location: Home.html');
	}
	$stmt->close();
	$conn->close();
	}
?>