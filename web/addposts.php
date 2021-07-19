<?php
include_once('app/config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	$ID        = isset($_POST['ID']) ? mysqli_real_escape_string($conn, $_POST['ID']) : "";
	$TITLE        = isset($_POST['TITLE']) ? mysqli_real_escape_string($conn, $_POST['TITLE']) : "";
	$DESCRIPTION  = isset($_POST['DESCRIPTION']) ? mysqli_real_escape_string($conn, $_POST['DESCRIPTION']) : "";
	$DATE  = isset($_POST['DATE']) ? mysqli_real_escape_string($conn, $_POST['DATE']) : "";
	// Insert data into database
	$sql = "INSERT INTO `testt_db`.`posts` ('ID', `TITLE`, `DESCRIPTION`, `DATE_TIME`) VALUES ('$ID','$TITLE','$DESCRIPTION', '$DATE');";
	$post_data_query = mysqli_query($conn, $sql);
	if($post_data_query){
		$json = array("status" => 1, "Success" => "inserted successfully!");
	}
	else{
		$json = array("status" => 0, "Error" => "cannot insert Please try again!");
	}
}
else{
	$json = array("status" => 0, "Info" => "Request method not accepted!");
}
@mysqli_close($conn);
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);

?>
