<?php
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
	
	$a=("$q1$q2$q3$q4$q5$q6$q7$q8$q9$q10");
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $db_name);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
		
		session_start(); 
		$b = $_SESSION['c'] ;
     
     $sql = "UPDATE personality_test SET S_ans = '$a' WHERE Personality_id = '$b'";
	 
	 //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
		
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}
		

     /*//Prepare statement
     
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("s", $a);
      $stmt->execute(); 
 		

*/   		  header('Location: Question3.html');

     }
     
     $conn->close();
 
?>