<?php

// Create connection
    include 'connection.php';
    session_start();

    $json = file_get_contents('php://input');
 
     // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
     
    
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM login where username='$username'";
    // echo($sql);
    $result = $conn->query($sql);

    // $results_array =array();

    if ($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $results_array['profile'] = $row;
            // $jsonArr = json_encode($tem);
            echo json_encode($row);
            // echo $mainJson;
        }

    } else {
        echo "No Results Found.";
    }
    
    $conn->close();
?>
