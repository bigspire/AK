<?php
/* 
Purpose : To edit the profile
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
	$query = "CALL get_profile_byid('$user_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing profile');
		}
		$admin_user_data = $mysql->display_result($result);
		$smarty->assign('rows',$admin_user_data);
		if($admin_user_data != ''){
			// assign the db values to form fields
			foreach($admin_user_data as $key => $record){
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
	// Validating the required fields
	if($fun->is_phonenumber($_POST['mobile']) || $fun->size_of_phonenumber($_POST['mobile'])) {
		$mobileErr = 'Please enter the valid mobile';
    	$smarty->assign('mobileErr',$mobileErr);
    	$test = 'error';
	}
	
	if($fun->email_validation($_POST['email_id'])) {
		$emailErr = 'Please enter the valid email';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}	
	
	// array for printing correct field name in error message
	$fieldtype = array('0','0','0');
	$actualfield = array('full name','email','mobile');
   $field = array('full_name' => 'full_nameErr', 'email_id' => 'emailErr' , 'mobile' => 'mobileErr');
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
	// query to check whether profile is exist or not. 
	$query = "CALL check_profile_exist('".$user_id."', '".$_POST['email_id']."', '".$_POST['mobile']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check profile exist');
		}
		$row = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	} 
	
	if(empty($test)){
		if($row['total'] == '0'){
			// query to edit admin user details.
			$query = "CALL edit_profile('".$user_id."','".$fun->is_white_space($mysql->real_escape_str($_POST['full_name']))."',
						'".$mysql->real_escape_str($_POST['email_id'])."','".$mysql->real_escape_str($_POST['mobile'])."',
						'".$modified_by."','".$date."')";

			// Calling the function that makes the update
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit profile');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['affected_rows'];
					if(!empty($last_id)){
						// show success message
						$succ_msg = "Profile updated successfully!";
						$smarty->assign('SUCCESS_MSG',$succ_msg);		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Profile is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Profile - AssessKey');  
$smarty->assign('setting_menu','active menu-open'); 
// display smarty file
$smarty->display('edit_profile.tpl');
?>