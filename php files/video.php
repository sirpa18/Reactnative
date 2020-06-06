<?php
 
// Create connection
	include 'connection.php';
    session_start();
    
    $username = $_SESSION['username'];

	$sql = "SELECT * FROM Videotable WHERE username='$username'";

	$result = $conn->query($sql);

	$results_array =array();

	if ($result->num_rows >0) {
		while($row[] = $result->fetch_assoc()) {
			$results_array['courses'] = $row;
			// $jsonArr = json_encode($tem);
			$mainJson = json_encode($results_array);
		}

	} else {
		echo "No Results Found.";
	}
	echo $mainJson;
	$conn->close();
?>
