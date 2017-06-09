<?php
/* 
Purpose : To change password
Created : Nikitasa
Date : 29-04-2017
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

$user_id = '1';
$smarty->assign('user_id',$user_id);
// validate url 
if(($fun->isnumeric($user_id)) || ($fun->is_empty($user_id)) || ($user_id == 0)){
  header('Location:page_error.php');
}

// get database values
if(empty($_POST)){
	$query = "CALL get_password_byid('$user_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing password');
		}
		$password_data = $mysql->display_result($result);
		$_SESSION['old_pwd'] = $password_data['password'];
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// encrypting password 
$old_password = md5($_POST['old_password']);
$password = md5($_POST['password']);
	
if(!empty($_POST)){	
	// validate old password
	if($old_password != $_SESSION['old_pwd']){
		$old_passwordErr = 'Wrong password';
    	$smarty->assign('old_passwordErr',$old_passwordErr);
    	$test = 'error';
	}
	
	// validate confirm password
	if($_POST['password'] != $_POST['confirm_password']){
		$confirm_passwordErr = 'Confirm password should be same as password';
    	$smarty->assign('confirm_passwordErr',$confirm_passwordErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('0','0','0');
	$actualfield = array('old password','new password','confirm password');
   $field = array('old_password' => 'old_passwordErr', 'password' => 'passwordErr' , 'confirm_password' => 'confirm_passwordErr');
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
		// query to edit admin user details.
		$query = "CALL edit_password('".$user_id."','".$fun->is_white_space($mysql->real_escape_str($password))."',
					'".$modified_by."','".$date."')";
		// Calling the function that makes the update
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing edit password');
			}
			$row = $mysql->display_result($result);
			$last_id = $row['affected_rows'];
				if(!empty($last_id)){
					// show success message
					$succ_msg = "Password updated successfully!";
					$smarty->assign('SUCCESS_MSG',$succ_msg);		
				}
			// free the memory
			$mysql->clear_result($result);
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}
// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Change Password - AssessKey');  

$smarty->assign('setting_menu','active menu-open'); 

// display smarty file
$smarty->display('change_password.tpl');
?>