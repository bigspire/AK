<?php 
/* 
Purpose : To get project.
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

$test_type_id = $_GET['test_type'];

// smarty drop down for project
$query ="CALL get_test_type_parameter('".$test_type_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing parameter type');
	}
	
	while($obj = $mysql->display_result($result)){
		$project[$obj['id']] = $obj['parameter'];  	   
	}
	
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo json_encode($project);

// closing mysql
$mysql->close_connection();	  
?>