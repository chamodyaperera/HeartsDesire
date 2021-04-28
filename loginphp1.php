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
		
		$sql = "SELECT Email, Password FROM user_detail WHERE Email = '$Email' and Password = '$Password'";
		
		if (!$result = $conn->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $Email, sorry about that. Please try again.";
    exit;
}
else {
	echo "md";
}


     
        //$result1 = mysqli_query($conn, "SELECT Email, Password FROM user_detail WHERE Email = '$Email' and Password = '$Password'");
	/*	
	 		
		$row = mysqli_fetch_array($result1);
		while($row = mysqli_fetch_array($result1))
     {
        print_r($row);
     } 
	 
	 echo $row['Email'];
	 echo $Email;
		if($row['Email']== $Email && $row['Password']== $Password ){
			echo " \nsuc";
		}
		else{
			echo " \r\nnot";
		}

	while($row=mysqli_fetch_assoc($result1))
		{
		$check_Email=$row['Email'];
		$check_Password=$row['Password'];
		
		
		
		
		if($Email == $check_Email && $Password == $check_Password){
			
			echo "Matches.";
		}
		
		else{
		echo "No match found.";
		}}
 
       /* if(mysqli_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["naam"] = $Email; 
        }
        else
        {
            echo 'The username or password are incorrect!';
        }*/
    }
} else {
 echo "All field are required";
 die();
}
?>