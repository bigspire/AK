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

$id = $_GET['id'];

// display smarty file
if(!empty($_POST)){
	// validate the field
	if(empty($_POST['parameter'])){
		$smarty->assign('paraErr', 'Please enter the parameter');
	}else{
		$smarty->assign('para_add', '1');
		// save the value and redirect to add question parameter
		// header('Location: set_question_parameter.php?status=created');	
	}
}
$mysql->close_connection();	  

$smarty->display('add_test_parameter.tpl');
// closing mysql
?>