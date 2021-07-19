<?php
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data 
	$ID       = isset($_POST['ID']) ? mysqli_real_escape_string($conn, $_POST['ID']) : "";
	
	// delete data from database
	$sql = "DELETE FROM `testt_db`.`posts` WHERE ID = $ID;";
	$post_data_query = mysqli_query($conn, $sql);
	if($post_data_query){
		$json = array("status" => 1, "Success" => "deleted successfully!");
	}
	else{
		$json = array("status" => 0, "Error" => "couldnt delete Please try again!");
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
