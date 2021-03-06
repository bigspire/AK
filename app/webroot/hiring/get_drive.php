<?php 
/* 
Purpose : To get drive.
Created : Nikitasa
Date : 20-04-2017
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// including theme file
include 'include/get_theme.php';

$project_id = $_GET['project'];
// smarty drop down for drive
$query ="CALL get_drives_byid('".$project_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing drive page');
	}
   $drive = array();
	while($obj = $mysql->display_result($result)){
   	$drive[$obj['id']] = $obj['drive_name'];  	   
	}

	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo json_encode($drive);

// closing mysql
$mysql->close_connection();	  
?>