<?php

	include 'connection.php';

	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	session_start();
	$username = $obj['username'];
	$password = $obj['password'];

	if($username!="" && $password!="")
	{
		if(!isset($username)){
			echo json_encode('User name is required for login');
		}
		else if(!isset($password)){
			echo json_encode('Password is required for login');
		}
		else {
			$selectQuery = $conn->query("SELECT username,password FROM login WHERE username='$username' AND password='$password'");

			if($selectQuery->num_rows>0){
                $_SESSION['username'] = $obj['username'];
				echo json_encode('OK'); 
			}
			else {
				echo json_encode('Invalid Username or Password!');  // alert msg in react native
			}	 	
		}
	}
	else{
	  echo json_encode('All Fields are Mandatory!');
	}
	$conn->close();
?>
