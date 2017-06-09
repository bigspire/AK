<?php
/* 
Purpose : To edit the project
Created : Nikitasa
Date : 25-04-2017
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
	$query = "CALL check_valid_project('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking project details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:project.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
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

// get database values
if(empty($_POST)){
	$query = "CALL get_project_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get project');
		}
		$project_data = $mysql->display_result($result);
		$smarty->assign('rows',$project_data);
		// assign the db values to form fields
		foreach($project_data as $key => $record){
			$smarty->assign($key,$record);		
		}   
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	$query = "CALL get_project_test_id('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing project test id');
		}
		$test_details_id = array();
		while($row = $mysql->display_result($result)){
			$test_details_id[] = $row['test_details_id'];
		}	
		$smarty->assign('test_details_id',$test_details_id);		
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
	// array for printing correct field name in error message
	$fieldtype = array('0','1','1');
	$actualfield = array('project name','company','status');
   $field = array('project_name' => 'projectErr','company_id' => 'companyErr', 'status' => 'statusErr');
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
	
	// validate test details
	if(empty($_POST['test_details_id'])){
 		$test_details_idErr = 'Please select the permissions';
 		$smarty->assign('test_details_idErr',$test_details_idErr);
 		$test = 'error';
 	}else{
 		$test_details_id = array(); 
 		$test_details_id = $_POST['test_details_id'];
 		$smarty->assign('test_details_id',$test_details_id);
	}
	
	// assigning the date
	$date =  $fun->current_date();
	$modified_by = 1;
	// query to check whether project is exist or not. 
	$query = "CALL check_project_exist('".$getid."', '".$fun->is_white_space($_POST['project_name'])."', '".$_POST['company_id']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check project exist');
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
			// query to edit project details.
			$query = "CALL edit_project('".$getid."','".$fun->is_white_space($mysql->real_escape_str($_POST['project_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['project_desc']))."','".$mysql->real_escape_str($_POST['company_id'])."',
						'".$mysql->real_escape_str($_POST['status'])."','".$modified_by."','".$date."')";
			// Calling the function that makes the update
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit project');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// clear the results	    			
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
				// delete all the existing permissions.
				$query = "CALL delete_project_test('".$getid."')";
				try{
	    			// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in executing delete project test query');
					}
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
					die;
				}
				if(!empty($affected_rows)){									
					foreach($test_details_id as $key => $val){
						// query to insert in to database. 
						$query = "CALL add_project_test('".$getid."','".$mysql->real_escape_str($val)."')";
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result2 = $mysql->execute_query($query)){ 
								throw new Exception('Problem in executing add project test');
							}
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
							die;
						}
					}
					// redirecting to list users page
					header('Location: project.php?current_status=updated');
				}		
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Project is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// smarty dropdown array for status
$smarty->assign('project_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Project - AssessKey');  

$smarty->assign('project_menu','active menu-open'); 

// display smarty file
$smarty->display('edit_project.tpl');
?>