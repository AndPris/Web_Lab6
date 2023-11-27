<?php 
	$conn = new mysqli("sql106.infinityfree.com", "if0_35501733", "zbE95UqqYTVM", "if0_35501733_lab6_tabs");
	if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

	$sql="SELECT title, data FROM tabs;";

	$result = $conn->query($sql);
	$conn->close();

	if($result) {
		$data = array();
		while ($row = $result->fetch_assoc()) {
		    $data[] = $row;
		}
	} else
		die("Selection error");

	header('Content-Type: application/json');
	echo json_encode($data);
?>