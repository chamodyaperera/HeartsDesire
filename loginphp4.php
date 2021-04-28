<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hearts desire');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: Home.html");
  exit;
}

$Email = $Password = "";
$Email_err = $Password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if Email is empty
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter Email.";
    } else{
        $Email = trim($_POST["Email"]);
    }
    
    // Check if Password is empty
    if(empty(trim($_POST["Password"]))){
        $Password_err = "Please enter your Password.";
    } else{
		$Password = trim($_POST["Password"]);
		
    }
    // Validate credentials
    if(empty($Email_err) && empty($Password_err)){
        // Prepare a select statement
        $sql = "SELECT User_id, Email, Password FROM user_detail WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
			
            mysqli_stmt_bind_param($stmt, "s", $param_Email);
            
            // Set parameters
            $param_Email = $Email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if Email exists, if yes then verify Password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $User_id, $Email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
					echo nl2br($User_id);
					echo nl2br("\n");
					echo nl2br($Email);
					echo nl2br("\n");
					echo nl2br($Password);
					echo nl2br("\n");
					echo nl2br($hashed_password);
					echo nl2br("\n");
                        if($Password== $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["User_id"] = $User_id;
                            $_SESSION["Email"] = $Email;                            
                            
                            // Redirect user to welcome page
                            header("location: Home.html");
                        } else{
							
                            // Display an error message if Password is not valid
                            echo nl2br( "The Password you entered was not valid");
                        }
                    }
                } else{
                    // Display an error message if Email doesn't exist
                    $Email_err = "No account found with that Email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }


            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>