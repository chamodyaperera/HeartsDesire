<?php
$ME = $_POST['ME'];
$MI = $_POST['MI'];
$MS = $_POST['MS'];
$MA = $_POST['MA'];
$FE = $_POST['FE'];
$FI = $_POST['FI'];
$FS = $_POST['FS'];
$FA = $_POST['FA'];

if (!empty($ME) || !empty($MI) || !empty($MS) || !empty($MA) || !empty($FE) || !empty($FI) || !empty($FS) || !empty($FA)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $db_name = "reg";
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $db_name);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT ME From register Where ME = ? Limit 1";
     $INSERT = "INSERT Into register (ME,MI,MS,MA,FE,FI,FS,FA) values(?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("iiiiiiii", $ME, $MI, $MS, $MA, $FE, $FI, $FS, $FA);
      $stmt->execute();
      echo "New record inserted sucessfully";
     }
     $stmt->close();
     $conn->close();
    }
 else {
 echo "All field are required";
 die();
}
?>