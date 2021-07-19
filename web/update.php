<?php
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data 
	$ID        = isset($_POST['ID']) ? mysqli_real_escape_string($conn, $_POST['ID']) : "";
	$TITLE        = isset($_POST['TITLE']) ? mysqli_real_escape_string($conn, $_POST['TITLE']) : "";
	$DESCRIPTION  = isset($_POST['DESCRIPTION']) ? mysqli_real_escape_string($conn, $_POST['DESCRIPTION']) : "";
	$DATE  = isset($_POST['DATE']) ? mysqli_real_escape_string($conn, $_POST['DATE']) : "";
	// update data 
	$sql = "UPDATE `testt_db`.`posts` SET TITLE= '$TITLE',
                   DESCRIPTION= '$DESCRIPTION'
				  WHERE ID='$ID' ";
	if($post_data_query){
		$json = array("status" => 1, "Success" => "updated successfully!");
	}
	else{
		$json = array("status" => 0, "Error" => "couldnt update Please try again!");
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
