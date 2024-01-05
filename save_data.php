<?php
	require_once 'config.php';

	$conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DATABASE);

	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    				
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $data = mysqli_real_escape_string($conn, $_POST['data']);

	$sql="INSERT INTO tabs(title, data) VALUES('$title', '$data');";
	if($conn->query($sql))
		echo "Data saved";
	else
		echo "Saving error";
	$conn->close();
?>
