<?php
/* 
Purpose : To add the candidate
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
// including theme file
include 'include/get_theme.php';
// Authenticating current user
if($_SESSION['back_end'] == ''){
  // header('location:login.php');
}

if(!empty($_POST)){
	// Validating the required fields
	if($fun->is_phonenumber($_POST['mobile']) || $fun->size_of_phonenumber($_POST['mobile'])) {
		$mobileErr = 'Please enter the valid mobile';
    	$smarty->assign('mobileErr',$mobileErr);
    	$test = 'error';
	}
	
	if($fun->email_validation($_POST['email'])) {
		$emailErr = 'Please enter the valid email address';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1' ,'1','0','0','0','0','1','1','1');
	$actualfield = array('company name','project name', 'drive name', 'first name','last name','email','mobile','state','district','status');
   $field = array('company' => 'companyErr','project' => 'projectErr','drive' => 'driveErr','first_name' => 'first_nameErr',
   	'last_name' => 'last_nameErr', 'email' => 'emailErr' ,'mobile' => 'mobileErr',
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
	// assigning the date
	$date =  $fun->current_date();
	$created_by = 1;
	// query to check whether email/mobile is exist or not. 
	$query = "CALL check_candidate_exist('0','".$_POST['email']."', '".$_POST['mobile']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check email/mobile exist');
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
			// query to insert candidate details.
			$query = "CALL add_candidate('".$mysql->real_escape_str($_POST['drive'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['emp_id']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['department']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['designation']))."',
						'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
						'".$mysql->real_escape_str($_POST['dist'])."','".$mysql->real_escape_str($_POST['status'])."',
			 			'".$created_by."','".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add candidate');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: candidate.php?current_status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Candidate is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
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

if($_POST['company'] != ''){
	// query to fetch all projects name. 
	$query = "CALL get_project('".$_POST['company']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing projects');
		}
		while($row = $mysql->display_result($result))
		{
 			$projects[$row['id']] = $row['project_name'];
		}
		$smarty->assign('projects',$projects);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if($_POST['project'] != ''){
	// query to fetch all drives name. 
	$query = "CALL get_drives_byid('".$_POST['project']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing drives');
		}
		while($row = $mysql->display_result($result))
		{
 			$drives[$row['id']] = $row['drive_name'];
		}
		$smarty->assign('drives',$drives);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
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
$smarty->assign('candidate_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Candidate - AssessKey');  

$smarty->assign('candidate_menu','active menu-open'); 

// display smarty file
$smarty->display('set_question_option.tpl');
?>