<?php
/* 
Purpose : To change configuration
Created : Nikitasa
Date : 29-04-2017
*/

// start session
session_start();
//unset session
session_destroy();
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

$user_id = '1';
$smarty->assign('user_id',$user_id);
// validate url 
if(($fun->isnumeric($user_id)) || ($fun->is_empty($user_id)) || ($user_id == 0)){
  header('Location:page_error.php');
}

// get database values
if(empty($_POST)){
	$query = "CALL get_configuration_byid('$user_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing configuration');
		}
		$configuration_data = $mysql->display_result($result);
		
		$_SESSION['theme'] = $configuration_data['theme'];
		$smarty->assign('theme',$_SESSION['theme']);
		$_SESSION['rec_page'] = $configuration_data['rec_page'];
		$smarty->assign('rec_page',$_SESSION['rec_page']);
		
		$smarty->assign('rows',$configuration_data);
		if($configuration_data != ''){
			// assign the db values to form fields
			foreach($configuration_data as $key => $record){
				$smarty->assign($key,$record);		
			} 
		} 
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
	
if(!empty($_POST)){	
	// array for printing correct field name in error message
	$fieldtype = array('1','0');
	$actualfield = array('no. of records per page','theme color');
   $field = array('rec_page' => 'no_recordsErr', 'theme' => 'colorErr');
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
	// assigning the date
	$date =  $fun->current_date();
	$created_by = 1;
		
	if(empty($test)){
		// query to edit configuration details.
		$query = "CALL edit_configuration('".$user_id."','".$mysql->real_escape_str($_POST['rec_page'])."',
					'".$mysql->real_escape_str($_POST['theme'])."','".$modified_by."','".$date."')";
		// Calling the function that makes the update
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing edit configuration');
			}
			$row = $mysql->display_result($result);
			$last_id = $row['affected_rows'];
				if(!empty($last_id)){
					// show success message
					$succ_msg = "Configuration updated successfully!";
					$smarty->assign('SUCCESS_MSG',$succ_msg);		
				}
			// free the memory
			$mysql->clear_result($result);
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}

$smarty->assign('records',array('10' => '10','20' => '20','25' => '25','50' => '50',
'100' => '100','200' => '200','250' => '250','500' => '500','-1' => 'All'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Configuration - AssessKey');  

$smarty->assign('setting_menu','active menu-open'); 

// display smarty file
$smarty->display('configuration.tpl');
?>