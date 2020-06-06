<?php

	include 'connection.php';


	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	
	$username = $obj['username'];
	$password = $obj['password'];
	$repeatpass = $obj['repeatpass'];

	$pass_exp='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/';
	
	if($username!="" && $password!="")
	{
	
	$user = $conn->query("SELECT * FROM login where username='$username'");
	
		if($user->num_rows==0){
			echo json_encode('No such User exists!');
		}
		else
		{
			if(!isset($username)){
				echo json_encode('UserName is required to reset password');
			}
			else if(!isset($password) || !preg_match($pass_exp, $password)){
                echo json_encode('Password is required and must contain at least 6 characters, including UPPER/lowercase and numbers');
            }
			else if(!isset($repeatpass) || ($password != $repeatpass)){
				echo json_encode('Password must be confirmed and both passwords should match');
			}
			else{
				$update = $conn->query("UPDATE login SET password='$password' WHERE username='$username'");
			
				if($update){
					echo json_encode('Your password has been reset successfully!'); // alert msg in react native
				}
				else{
				   echo json_encode('Error updating your password!Try again'); // our query fail 		
				}
			}
			
		}
	}
	
	else{
	  echo json_encode('All Fields are Mandatory!');
	}
	$conn->close();
	
?>