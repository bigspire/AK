<?php 
/* 
Purpose : To get distict.
Created : Nikitasa
Date : 19-04-2017
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

$states_id = $_GET['state'];

// smarty drop down for District
$query ="CALL get_district_byid('".$states_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing district page');
	}
    //$dist = array();
	while($obj = $mysql->display_result($result)){
		$dist[$obj['id']] = $obj['district_name'];  	   
	}	
	
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


echo json_encode($dist);

// closing mysql
$mysql->close_connection();	  
?>