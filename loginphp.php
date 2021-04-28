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
     
        $result1 = mysqli_query($conn, "SELECT Email, Password FROM user_detail WHERE Email = '$Email' and Password = '$Password'");
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
		}*/

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