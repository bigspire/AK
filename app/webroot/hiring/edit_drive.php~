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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid != ''){
	$query = "CALL check_valid_drive('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking drive details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:drive.php?current_status=msg");
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
	$query = "CALL get_drive_details_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get drive');
		}
		$drive_data = $mysql->display_result($result);
		$smarty->assign('rows',$drive_data);
		$smarty->assign('from_date',$fun->convert_date_display($drive_data['drive_from']));
		$smarty->assign('to_date',$fun->convert_date_display($drive_data['drive_to']));
		// assign the db values to form fields
		foreach($drive_data as $key => $record){
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
	// from - to date validation
	$fdate=strtotime($fun->convert_date($_POST['from_date']));
	$tdate=strtotime($fun->convert_date($_POST['to_date']));	
	if($fun->validity_diff($fdate, $tdate) != true){
		$drive_toErr = 'Please select the correct drive to date'; 
		$test = 'error';		
		$smarty->assign('drive_toErr',$drive_toErr);
	}
	// array for printing correct field name in error message
	$fieldtype = array('1','1','0','0','1','1','1','1','1','1');
	$actualfield = array('company name','project','drive name','drive venue','drive from date',
		 'drive to date','drive type','drive state','drive district','status');
   $field = array('company' => 'companyErr','project' => 'projectErr', 'drive_name' => 'drive_nameErr' ,
   	 'drive_venue' => 'drive_venueErr','from_date' => 'drive_fromErr','to_date' => 'drive_toErr', 
   	 'drive_type' => 'typeErr','state' => 'stateErr', 'dist' => 'districtErr', 'status' => 'statusErr');
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
	// convert drive date
	// convert drive date
	$from_date = $fun->convert_date($_POST['from_date']);
	$to_date = $fun->convert_date($_POST['to_date']);
	
	// query to check whether drive is exist or not. 
	$query = "CALL check_drive_exist('".$getid."', '".$_POST['project']."', '".$fun->is_white_space($_POST['drive_name'])."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check drive exist');
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
			// query to edit drive details.
			$query = "CALL edit_drive('".$getid."','".$mysql->real_escape_str($_POST['project'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_venue']))."','".$mysql->real_escape_str($from_date)."',
						'".$mysql->real_escape_str($to_date)."','".$mysql->real_escape_str($_POST['drive_type'])."','".$mysql->real_escape_str($_POST['dist'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_member']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['facility_venue']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['facility_arrange']))."',
						'".$mysql->real_escape_str($_POST['status'])."','".$modified_by."','".$date."')";
			// Calling the function that makes the update
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit drive');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['affected_rows'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: drive.php?current_status=updated');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Drive is already exists";
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

$company = $_POST['company'] ? $_POST['company'] : $drive_data['company'];
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
$state = $_POST['state'] ? $_POST['state'] : $drive_data['state'];
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
$smarty->assign('drive_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Drive - AssessKey');  

$smarty->assign('drive_menu','active menu-open'); 

// display smarty file
$smarty->display('edit_drive.tpl');
?>