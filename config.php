<?php
 
$dbName="testt_db";
$conn = mysqli_connect("localhost", "root", "", $dbName);
if(!$conn)
    {
    trigger_error('Could not Connect' .mysqli_connect_error());
    echo "\n";
    }
else
    {
    //echo "Successfully connected to database" ."\n"; 
    }


?>