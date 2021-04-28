<?php

$Email = stripslashes($_POST["Email"]); 

$Password = stripslashes($_POST["Password"]); 

if (!empty($Email) || !empty($Password)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $db_name = "hearts desire";
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $db_name);
	
$Password = mysqli_real_escape_string($conn, $_POST["Password"]); 

$Email = mysqli_real_escape_string($conn, $_POST["Email"]);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
		
		$stmt = $conn->prepare("SELECT Email, Password FROM user_detail WHERE Email = ? and Password = ?");
		
		
	$stmt->bind_param('ss', $Email, $Password);
	$stmt->execute();
	
	$stmt->bind_result($Email, $Password);echo("d");
	if ($stmt->fetch()) {
		header('Location: Home.html');
		

		// $userId is also set to the result `id` now
	} 
	/*else {
		echo "<script>alert('Please Enter Valid Email or Password');</script>"; 
		
		echo "<script>window.location.replace('login.html');</script>";
		}
    }
}*/
 else {
 echo "All field are required";
 die();
}}}
?>