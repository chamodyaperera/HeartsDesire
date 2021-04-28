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
/*
$command = escapeshellcmd('python3 C:\\xampp\\htdocs\\Hearts Desire\\personality 1.py');
$output = shell_exec($command);
echo $output;*/

//$command = escapeshellcmd('python3 C:\\xampp\\htdocs\\New\\new.py');
$output = shell_exec('python  C:\\xampp\\htdocs\\Hearts Desire\\personality 1.py');
var_dump($output);
	


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
		//$b= 141;
		
     //echo shell_exec("C:/xampp/htdocs/Hearts Desie/personality.py '$b'");
    
	
	// $command = system("C:/xampp/htdocs/Hearts Desie/personality.py '$b'");
	 //$output1 = shell_exec($command);
		//echo $output1;
	 
	 $command = system("C:/xampp/htdocs/Hearts Desire/personality.py $a > /dev/null 2>&1 &");
		$output1 = shell_exec($command);
		echo $output1;
	 
      $sql = "UPDATE personality_test SET J_ans = '$a' WHERE Personality_id = '$b'";
	  
	  echo($b);
	 
		
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}		  
   		  header('Location: signup.html');

     }
     $conn->close();
 
?>