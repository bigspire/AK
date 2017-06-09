<?php
/* 
Purpose : To list the candidate
Created : Nikitasa
Date : 13-04-2017
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

// when the form is submitted
if(!empty($_POST)){
	// array for printing correct field name in error message
	$fieldtype = array('1', '1' ,'1','0','0','0','0','1','1','1');
	$actualfield = array('company name','project name', 'test name', 'test code','test type','email','mobile','state','district','status');
	$field = array('company' => 'companyErr','project' => 'projectErr','test_name' => 'testErr','test_code' => 'codeErr',
				   'test_type' => 'testtypeErr', 'email' => 'emailErr' ,'mobile' => 'mobileErr',
				   'state' => 'stateErr', 'dist' => 'districtErr', 'status' => 'statusErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$smarty->assign($field,$_POST[$field]);
		}
		$j++;
	}
}

// query to fetch all companies name. 
$query = 'CALL get_companies()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing company');
	}
	while($row = $mysql->display_result($result))
	{
 		$companies[$row['id']] = $row['company_name'];
	}
	$smarty->assign('companies',$companies);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty drop down for test details
$query = "call get_test_details()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get test details');
	}
	$test_details = array();
	while($obj = $mysql->display_result($result)){
    	$test_details[$obj['id']] = $obj['test_name'];    		   
	}

	$smarty->assign('test_details',$test_details);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch the languages 
$query = 'CALL get_language()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing company');
	}
	while($row = $mysql->display_result($result))
	{
 		$lang[$row['id']] = $row['language'];
	}
	$smarty->assign('languages',$lang);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// set no. of question array
$i = 1;
while($i <= 500){
 $q[$i] = $i;
 $i++;
}
$smarty->assign('qn_data', $q);
// status array
$smarty->assign('status', array('1' => 'Active', '0' => 'Inactive'));
// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Online Test - AssessKey');  

$smarty->assign('pp_menu','active menu-open'); 

// display smarty file
$smarty->display('add_ot.tpl');
?>