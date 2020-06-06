<?php

	include 'connection.php';

	session_start();

	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	
	$username = $_SESSION['username'];
	$video = $obj['video'];
    
    
    $heading = "";
    
    if($video == "Workout"){
        $heading = "WORKOUT";
        $_SESSION['heading'] ="WORKOUT";
    }
    if($video == "Swimming"){
        $heading = "SWIMMING";
        $_SESSION['heading'] ="SWIMMING";
    }
    if($video == "Astronomy"){
        $heading = "ASTRONOMY";
        $_SESSION['heading'] = "ASTRONOMY";
    }
    if($video == "Kinematics"){
        $heading = "KINEMATICS";
        $_SESSION['heading'] = "KINEMATICS";
    }
    if($video == "Yoga and Physiology"){
        $heading = "YOGA AND PHYSIOLOGY";
        $_SESSION['heading'] = "YOGA AND PHYSIOLOGY";
    }
    if($video == "Breathe is life"){
        $heading = "BREATHE IS LIFE";
        $_SESSION['heading'] = "BREATHE IS LIFE";
    }
    if($video == "Power of healthy eating"){
        $heading = "POWER OF HEALTHY EATING";
        $_SESSION['heading'] = "POWER OF HEALTHY EATING";
    }
    if($video == "Relativity and Astrophysics"){
        $heading = "RELATIVITY AND ASTROPHYSICS";
        $_SESSION['heading'] = "RELATIVITY AND ASTROPHYSICS";
    }
    if($video == "Spatial Data Visualization"){
        $heading = "SPATIAL DATA VISUALIZATION";
        $_SESSION['heading'] = "SPATIAL DATA VISUALIZATION";
    }

	if($username!="" && $video!="")
	{
		
                $add = $conn->query("INSERT INTO Videotable (username,video,heading) VALUES('$username','$video','$heading')");
            
                if($add){
                    echo json_encode('Video Added Successfully'); // alert msg in react native
                }
                else{
                   echo json_encode('check internet connection'); // our query fail
                }
            }
	
	else{
	  echo json_encode('All Fields are Mandatory!');
	}
	$conn->close();
?>
