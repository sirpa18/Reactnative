<?php

// Create connection
	include 'connection.php';


	$sql = "SELECT * FROM contributions";

	$result = $conn->query($sql);

	$results_array =array();
	$mainJson = null;
	if ($result->num_rows >0) {
		while($row[] = $result->fetch_assoc()) {
			$results_array['data'] = $row;
			// $jsonArr = json_encode($tem);
			$mainJson = json_encode($results_array);
		}

	} else {
		echo "No Results Found.";
	}
	echo $mainJson;
	$conn->close();
?>