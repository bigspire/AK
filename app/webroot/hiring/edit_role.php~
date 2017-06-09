<?php
/* 
Purpose : To edit the role
Created : Nikitasa
Date : 05-05-2017
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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid != ''){
	$query = "CALL check_valid_role('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking role details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:roles.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// smarty drop down for permission
$query = "call get_permissions()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get permission query');
	}
	$permissions = array();
	while($role_permission = $mysql->display_result($result)){
    	$permissions[$role_permission['id']] = $role_permission['module_name'];    		   
	}
	// clear the results	    			
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
$smarty->assign('permissions',$permissions);


// get database values
if(empty($_POST)){
	$query = "CALL get_role_details('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get role');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}  
		
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	$query = "CALL get_modules_id('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get module id');
		}
		$modules_id = array();
		while($row = $mysql->display_result($result)){
			$modules_id[] = $row['modules_id'];
		}	
		$smarty->assign('modules_id',$modules_id);		
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
	$fieldtype = array('0', '1');
	$actualfield = array('role name ','status');
   $field = array('role_name' => 'role_nameErr', 'status' => 'statusErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if(empty($_POST[$field]) && $_POST[$field] != '0'){
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
 	if(empty($_POST['modules_id'])){
 		$permissionErr = 'Please select the permissions';
 		$smarty->assign('permissionErr',$permissionErr);
 		$test = 'error';
 	}else{
 		$modules_id = array(); 
 		$modules_id = $_POST['modules_id'];
 		$smarty->assign('modules_id',$modules_id);
	}
	// assigning the date
	$date =  $fun->current_date();
	$modified_by = 1;
	
	// query to check whether it is exist or not. 
	$query = "CALL check_role_exist('".$getid."', '".$fun->is_white_space($_POST['role_name'])."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check role exist');
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
			// query to insert role. 
			$query = "CALL edit_role('".$getid."','".$mysql->real_escape_str($_POST['role_name'])."', '".$mysql->real_escape_str($_POST['description'])."', 
	 		'".$mysql->real_escape_str($_POST['status'])."', '".$date."', '".$modified_by."')";
			try{
	    		// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit role query');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// clear the results	    			
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
				// delete all the existing permissions.
				$query = "CALL delete_role_module('".$getid."')";
				try{
	    			// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in executing delete permission query');
					}
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
					die;
				}	
				if($affected_rows != ''){
					foreach($modules_id as $key => $val){
						// query to insert into database. 
						$query = "CALL add_permissions('".$getid."','".$mysql->real_escape_str($val)."')";				
						try{
	    					// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in executing insert permission query');
							}
							// next query execution
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
							die;
						}
					}
					// redirecting to list page
					header("Location: roles.php?status=updated");
				}				
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				die;
			}
			
		}else{
			$msg = "Role name already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty drop down array for role status
$smarty->assign('role_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Role - AssessKey');  

$smarty->assign('page' , 'edit_role');  
$smarty->assign('setting_role','active menu-open'); 
$smarty->assign('setting_menu','active menu-open'); 
// display smarty file
$smarty->display('edit_role.tpl');
?>