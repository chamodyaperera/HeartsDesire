<?php

session_start();

$errors = array(); 

/*

// initializing variables
$F_name = $_POST['F_name'];
$L_name = $_POST['L_name'];
$NIC = $_POST['NIC'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Password2 = $_POST['Password2'];
$Gender = $_POST['Gender'];
$Relationship = $_POST['Relationship'];
$Address = $_POST['Address'];
$Phone = $_POST['Phone'];
$About = $_POST['About'];*/

 	
	
	$conn = mysqli_connect('localhost', 'root', '', 'hearts desire');
		// REGISTER USER
		if (isset($_POST['reg_user'])) {
		  // receive all input values from the form
		$F_name = mysqli_real_escape_string($conn, $_POST['F_name']);
		$L_name = mysqli_real_escape_string($conn, $_POST['L_name']);
		$NIC = mysqli_real_escape_string($conn, $_POST['NIC']);
		$Email = mysqli_real_escape_string($conn, $_POST['Email']);
		$Password = mysqli_real_escape_string($conn, $_POST['Password']);
		$Password2 = mysqli_real_escape_string($conn, $_POST['Password2']);
		$Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
		$Relationship = mysqli_real_escape_string($conn, $_POST['Relationship']);
		$Address = mysqli_real_escape_string($conn, $_POST['Address']);
		$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
		$About = mysqli_real_escape_string($conn, $_POST['About']);
		$Image = $_POST['Image'];
		

  /*$username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);*/

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($F_name)) { array_push($errors, "First Name is required"); }
  if (empty($L_name)) { array_push($errors, "Last Name is required"); }
  if (empty($NIC)) { array_push($errors, "NIC is required"); }
  if (empty($Email)) { array_push($errors, "Email is required"); }
  if (empty($Password)) { array_push($errors, "Password is required"); }
  if ($Password != $Password2) {
	  
	echo "<script>alert('Passwords are not matched');</script>"; 
		echo "<script>window.location.replace('signup.html');</script>";
		$conn->close();
  }
  if (empty($Gender)) { array_push($errors, "First Name is required"); }
  if (empty($Relationship)) { array_push($errors, "Last Name is required"); }
  if (empty($Address)) { array_push($errors, "NIC is required"); }
  if (empty($Phone)) { array_push($errors, "Email is required"); }
  if (empty($About)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  
  $user_check_query = "SELECT * FROM user_detail WHERE NIC='$NIC' OR Email='$Email' OR Phone='$Phone' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
  
  if ($user) { // if user exists
    if ($user['NIC'] === $NIC) {
		echo "<script>alert('NIC already exists');</script>"; 
		
		echo "<script>window.location.replace('signup.html');</script>";
		$conn->close();
		
     
    }

    if ($user['Email'] === $Email) {
		echo "<script>alert('Email already exists');</script>"; 
		echo "<script>window.location.replace('signup.html');</script>";
		$conn->close();
		
    }
	 if ($user['Phone'] === $Phone) {
		 echo "<script>alert('Phone No already exists');</script>";
		 echo "<script>window.location.replace('signup.html');</script>"; 
		 $conn->close();
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	$Password = trim($_POST["Password"]);
  

	
	$b = $_SESSION['c'];
	
   // $file = addslashes(file_get_contents($_FILES[$Image]["tmp_name"]));
	

  	$query = "INSERT INTO user_detail (User_id,Personality_id,F_name,L_name,NIC,Email,Password,Password2,Gender,Relationship,Address,Phone,About) 
  			  VALUES('$b','$b',?,?,?,?,?,?,?,?,?,?,?)";
	
	$stmt = $conn->prepare($query);
      $stmt->bind_param("sssssssssis",$F_name,$L_name,$NIC,$Email,$Password,$Password2,$Gender,$Relationship,$Address,$Phone,$About);
      $stmt->execute();
	
	
	header('Location: User preference.html');
	$stmt->close();
	$conn->close();

	/*		  
  	mysqli_query($conn, $query);
	
	echo($F_name);
  	$_SESSION['Email'] = $Email;
  	$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
	*/
	
  }
  }


/*
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];


    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $db_name = "hearts desire";
	
	$a=("[$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10]");
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $db_name);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
		
		session_start(); 
		$b = $_SESSION['c'] ;
     
      $sql = "UPDATE personality_test SET J_ans = '$a' WHERE Personality_id = '$b'";
	 
		
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}
		  
   		  header('Location: signup.html');

     }
     
     $conn->close();*/
	
?>