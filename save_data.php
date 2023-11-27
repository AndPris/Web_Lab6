<?php 
	$conn = new mysqli("sql106.infinityfree.com", "if0_35501733", "zbE95UqqYTVM", "if0_35501733_lab6_tabs");
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
