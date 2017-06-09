<?php
/* 
Purpose : To edit the candidate
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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid != ''){
	$query = "CALL check_valid_candidate('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking candidate details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:candidate.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// get database values
if(empty($_POST)){
	$query = "CALL get_candidate_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get candidate');
		}
		$candidate_data = $mysql->display_result($result);
		$smarty->assign('rows',$candidate_data);
		// assign the db values to form fields
		foreach($candidate_data as $key => $record){
			$smarty->assign($key,$record);		
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
	
	if($fun->email_validation($_POST['email'])) {
		$emailErr = 'Please enter the valid email address';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('0', '0' ,'0','0','1','1','1','1','1','1');
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
	$modified_by = 1;
	// query to check whether email/mobile is exist or not. 
	$query = "CALL check_candidate_exist('".$getid."', '".$_POST['email']."', '".$_POST['mobile']."')";
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
			// query to edit candidate details.
			$query = "CALL edit_candidate('".$getid."','".$mysql->real_escape_str($_POST['drive'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['emp_id']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['department']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['designation']))."',
						'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
						'".$mysql->real_escape_str($_POST['dist'])."','".$mysql->real_escape_str($_POST['status'])."',
			 			'".$modified_by."','".$date."')";

			// Calling the function that makes the update
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit candidate');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['affected_rows'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: candidate.php?current_status=updated');		
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

// query to fetch all projects name. 

$company = $_POST['company'] ? $_POST['company'] : $candidate_data['company'];
$query = "CALL get_project('".$company."')";
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

// query to fetch all drives name. 
$project = $_POST['project'] ? $_POST['project'] : $candidate_data['project'];
$query = "CALL get_drives_byid('".$project."')";
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

// smarty drop down for District
$state = $_POST['state'] ? $_POST['state'] : $candidate_data['state'];
$query = "CALL get_district_byid('".$state."')";
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

// smarty dropdown array for status
$smarty->assign('candidate_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Candidate - AssessKey');  

$smarty->assign('candidate_menu','active menu-open'); 

// display smarty file
$smarty->display('edit_candidate.tpl');
?>