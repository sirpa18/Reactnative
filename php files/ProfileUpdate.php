<?php

	include 'connection.php';

	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	$obj = json_decode($json,true);
	 
	$username = $obj['username'];
	$email = $obj['email'];
	$firstname = $obj['firstname'];
	$lastname = $obj['lastname'];
	$reason = $obj['reason'];
	$contribution = $obj['contribution'];
 
	$email_exp='/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/';

	if($email!="" &&  $firstname!="" && $lastname!="" && $reason!="" && $contribution!=""){

		if(!isset($email) || !preg_match($email_exp,$email)){
	        echo json_encode('You entered an invalid email!');
	    }
	    else if(!isset($firstname)){
            echo json_encode('First name cannot be Empty');
        }
        else if(!isset($lastname)){
            echo json_encode('Last name cannot be Empty');
        }
        else if(!isset($reason)){
            echo json_encode('Reason for joining Asgardia cannot be Empty');
        }
         else if(!isset($contribution)){
            echo json_encode('Your contribution to Asgardia cannot be Empty');
        }
        else{

        	$update = $conn->query("UPDATE login SET email='$email',firstname='$firstname',lastname='$lastname',reason='$reason',contribution='$contribution' WHERE username='$username'");
        	
        	if ($update) {
    			echo json_encode('Profile Updated Successfully');
			} 
			else {
    			echo json_encode('Error Updating profile');
			}
        }

        
	}
$conn->close();
?>