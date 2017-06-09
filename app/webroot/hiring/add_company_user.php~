<?php
/* 
Purpose : To add the company user page
Created : Nikitasa
Date : 28-04-2017
*/

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
$id = $_GET['company_id'];
if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
}
if(!empty($_POST)){
	// Validating the required fields
	if($fun->is_phonenumber($_POST['mobile']) || $fun->size_of_phonenumber($_POST['mobile'])) {
		$mobileErr = 'Please enter the valid phone';
    	$smarty->assign('mobileErr',$mobileErr);
    	$test = 'error';
	}
	
	if($fun->email_validation($_POST['email'])) {
		$emailErr = 'Please enter the valid email address';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	if($_POST['password'] != $_POST['confirm_password']) {
		$confirm_passwordErr = 'Confirm password should be same as password';
    	$smarty->assign('confirm_passwordErr',$confirm_passwordErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('0','0','0','0','0','1','1');
	$actualfield = array('contact person','email','mobile','password','confirm password','role','status');
   $field = array('contact_person' => 'contact_personErr', 'email' => 'emailErr' , 'mobile' => 'mobileErr',
   'password' => 'passwordErr','confirm_password' => 'confirm_passwordErr', 'role' => 'roleErr','status' => 'statusErr');
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
	// query to check whether email/mobile is exist or not. 
	$query = "CALL check_company_user_exist('0', '".$_POST['email']."', '".$_POST['mobile']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check email/phone exist');
		}
		$row = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	} 
	
	// encrypting password 
	$password = md5($_POST['password']);
	
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert company user details.
			$query = "CALL add_company_user('".$fun->is_white_space($mysql->real_escape_str($_POST['contact_person']))."',
						'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
						'".$fun->is_white_space($mysql->real_escape_str($password))."',
						'".$fun->is_white_space($mysql->real_escape_str($id))."',
						'".$mysql->real_escape_str($_POST['role'])."',
						'".$mysql->real_escape_str($_POST['status'])."','".$created_by."','".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add company user');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list company users page
						header('Location: company_users.php?company_id='.$id.'&current_status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Company user is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// smarty drop down array for status
$smarty->assign('company_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty drop down for permission
$query = "call get_role_id()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get role');
	}
	$roles = array();
	while($role_permission = $mysql->display_result($result)){
    	$roles[$role_permission['id']] = $role_permission['role_name'];    		   
	}

	$smarty->assign('roles',$roles);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Company User - AssessKey');  
$smarty->assign('company_menu','active menu-open'); 
// display smarty file
$smarty->display('add_company_user.tpl');
?>