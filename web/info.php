<?php
	include_once('app/config.php');
	
	$sql = "SELECT * FROM `testt_db`.`posts` ;";
	$get_data_query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($get_data_query)!=0){
		$result = array();
		
		while($r = mysqli_fetch_array($get_data_query)){
			extract($r);
			$result[] = array("ID" => $ID,"TITLE" => $TITLE, "DESCRIPTION" => $DESCRIPTION, 'DATE_TIME' => $DATE_TIME);
		}
		$json = array("status" => 1, "info" => $result);
	}
	else{
		$json = array("status" => 0, "error" => "To-Do not found!");
	}
@mysqli_close($conn);

header('Content-type: application/json');
echo json_encode($json);
