<?php
/* 
Purpose : To add the company
Created : Nikitasa
Date : 24-04-2017
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

if(!empty($_POST)){
	// Validating the required fields
	if($fun->is_phonenumber($_POST['phone']) || $fun->size_of_phonenumber($_POST['phone'])) {
		$phoneErr = 'Please enter the valid phone';
    	$smarty->assign('phoneErr',$phoneErr);
    	$test = 'error';
	}
	
	if($fun->email_validation($_POST['email'])) {
		$emailErr = 'Please enter the valid email address';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('0','0','0','0','1','1','1','0','0');
	$actualfield = array('company name','email','phone','address','state','district','status','contract validity','scope of work');
   $field = array('company_name' => 'companyErr', 'email' => 'emailErr' , 'phone' => 'phoneErr',
   'address' => 'addressErr','state' => 'stateErr', 'dist' => 'districtErr', 'status' => 'statusErr',
   'validity' => 'validityErr', 'scope_work' => 'scope_workErr');
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
	$query = "CALL check_company_exist('0', '".$_POST['email']."', '".$_POST['phone']."')";
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

	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert company details.
			$query = "CALL add_company('".$fun->is_white_space($mysql->real_escape_str($_POST['company_name']))."',
						'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['phone'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['address']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['website']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['company_profile']))."',
						'".$mysql->real_escape_str($_POST['dist'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['po_no']))."',
						'".$mysql->real_escape_str($fun->convert_date($_POST['validity']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['scope_work']))."',
						'".$mysql->real_escape_str($_POST['status'])."',
			 			'".$created_by."','".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add company');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: company.php?current_status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Company is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// smarty drop down for State
$query = 'CALL get_state()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing state');
	}
	$states = array();
	$states_id = array();
	while($state = $mysql->display_result($result)){
    	$states[$state['id']] = $state['state_name'];    		   
    	$states_id[] = $state['id'];    		   
	}
	$smarty->assign('state_id',$states);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if($_POST['state'] != ''){
	// smarty drop down for District
	$query = "CALL get_district_byid('".$_POST['state']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing district');
		}
		$districts = array();
		while($district = $mysql->display_result($result)){
   		$districts[$district['id']] = $district['district_name'];    		   
		}
		$smarty->assign('dist_id',$districts);
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// smarty drop down array for status
$smarty->assign('company_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
$smarty->assign('page_title' , 'Add Company - AssessKey');  

$smarty->assign('company_menu','active menu-open'); 

// display smarty file
$smarty->display('add_company.tpl');
?>