<?php
/* 
Purpose : To add the drive
Created : Nikitasa
Date : 26-04-2017
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
	// from - to date validation
	$fdate=strtotime($fun->convert_date($_POST['drive_from']));
	$tdate=strtotime($fun->convert_date($_POST['drive_to']));	
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
   	 'drive_venue' => 'drive_venueErr','drive_from' => 'drive_fromErr','drive_to' => 'drive_toErr', 
   	 'type' => 'typeErr','state' => 'stateErr', 'dist' => 'districtErr', 'status' => 'statusErr');
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
	// convert drive date
	$from_date = $fun->convert_date($_POST['drive_from']);
	$to_date = $fun->convert_date($_POST['drive_to']);
	
	// query to check whether drive is exist or not. 
	$query = "CALL check_drive_exist('0', '".$_POST['project']."', '".$fun->is_white_space($_POST['drive_name'])."')";
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
			// query to insert drive details.
			$query = "CALL add_drive('".$mysql->real_escape_str($_POST['project'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_venue']))."','".$mysql->real_escape_str($from_date)."',
						'".$mysql->real_escape_str($to_date)."','".$mysql->real_escape_str($_POST['type'])."','".$mysql->real_escape_str($_POST['dist'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['drive_members']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['facility_available']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['facility_organized']))."',
						'".$mysql->real_escape_str($_POST['status'])."',
			 			'".$created_by."','".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add drive');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: drive.php?current_status=created');		
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
$smarty->assign('drive_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Drive - AssessKey');  

$smarty->assign('drive_menu','active menu-open'); 

// display smarty file
$smarty->display('add_drive.tpl');
?>