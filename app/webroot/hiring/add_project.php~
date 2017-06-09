<?php
/* 
Purpose : To add the project
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

if(!empty($_POST)){
	// Validating the required fields
	// array for printing correct field name in error message
	$fieldtype = array('0','1','1');
	$actualfield = array('project name','company','status');
   $field = array('project_name' => 'projectErr','company' => 'companyErr', 'status' => 'statusErr');
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
	
	// test details validation
	if(empty($_POST['test_detail'])){
 		$test_detailErr = 'Please select the test details';
 		$smarty->assign('test_detailErr',$test_detailErr);
 		$test = 'error';
 	}else{
 		$test_detail_ar = array(); 
 		$test_detail_ar = $_POST['test_detail'];
 		$smarty->assign('test_detail_ar',$test_detail_ar);
	}
	
	// assigning the date
	$date =  $fun->current_date();
	$created_by = 1;
	// query to check whether project is exist or not. 
	$query = "CALL check_project_exist('0', '".$fun->is_white_space($_POST['project_name'])."', '".$_POST['company']."')";
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
			// query to insert project details.
			$query = "CALL add_project('".$fun->is_white_space($mysql->real_escape_str($_POST['project_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['project_desc']))."','".$mysql->real_escape_str($_POST['company'])."',
						'".$mysql->real_escape_str($_POST['status'])."','".$created_by."','".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add project');
				}
				$row = $mysql->display_result($result);
				$project_id = $row['inserted_id'];
				if(!empty($project_id)){									
					// next query execution
					$mysql->next_query();
					foreach($test_detail_ar as $key => $val){
	
						// query to insert in to database. 
						$query = "CALL add_project_test('".$mysql->real_escape_str($project_id)."','".$mysql->real_escape_str($val)."')";
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result2 = $mysql->execute_query($query)){ 
								throw new Exception('Problem in executing add project test');
							}
							$obj = $mysql->display_result($result2);
							// free the memory
							$mysql->clear_result($result2);
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
							die;
						}
					}
				}
				$last_id = $obj['inserted_id'];
				if(!empty($last_id)){
					// redirecting to list users page
					header('Location: project.php?current_status=created');		
				}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Project is already exists";
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

// smarty drop down array for status
$smarty->assign('project_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Project - AssessKey');  

$smarty->assign('project_menu','active menu-open'); 

// display smarty file
$smarty->display('add_project.tpl');
?>