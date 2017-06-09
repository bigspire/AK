<?php
/* 
Purpose : To view the candidate
Created : Nikitasa
Date : 17-04-2017
*/

// start session
session_start();
// include smarty configuration file
include 'configs/smartyconfig.php';
// including database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// including function class file
include('classes/class.function.php');
// including theme file
include 'include/get_theme.php';
// Authenticating current user
if($_SESSION['back_end'] == ''){
  // header('location:login.php');
}

// get record id   
$id = $_GET['id'];
if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
}

// select and execute query and fetch the result
$query = "CALL view_candidate('$id')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view candidate page');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('status', $fun->display_status($row['status']));
	$smarty->assign('candidate_data',$row);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data', $data);

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'View Candidates - AssessKey');  

$smarty->assign('candidate_menu','active menu-open'); 

// display smarty file
$smarty->display('view_candidate.tpl');
?>