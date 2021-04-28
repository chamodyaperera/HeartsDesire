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
     
     $INSERT = "INSERT Into personality_test (E_ans) values(?)";
     //Prepare statement
     
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("s", $a);
      $stmt->execute();
	  
	  //echo ($a);
	  
	  $id = mysqli_query($conn,"SELECT Personality_id from personality_test where E_ans= '$a'");
	  
	  if(! $id ) {
      die('Could not get data: ' . mysqli_error($conn));
   		}
   
		   while($row = mysqli_fetch_assoc($id)) {
			 $b=$row['Personality_id'];
		   }
		   echo ($b);
		   session_start(); 
		   $_SESSION['c'] = $b;
		   
 		

		  
   		  header('Location: Question2.html');

	
	  
	/*  
	$stmt2 = $conn->prepare('SELECT Personality_id FROM personality_test where Personality_id=44');
	$stmt2->execute();
	$row = $stmt2->fetch();
	echo $row['Personality_id'];
	echo"j";

	  
	  
      /* $sql = 'SELECT Personality_id FROM personality_test where (E_ans)= "[0,0,1,0,0]"';
	   $retval = mysqli_query($conn, $sql);
	   
	   if(! $retval ) {
		  die('Could not get data: ' . mysqli_error($conn));
	   }
	   
	   while($row = mysqli_fetch_assoc($retval)) {
		  echo ($sql);
	   }
   
   mysqli_free_result($retval);
   echo "Fetched data successfully\n";
   

	  /*
	  */
     }
     
     $stmt->close();
     $conn->close();
 
?>