<?php
/* 
Purpose : To add the role
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

if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0','1');
	$actualfield = array('role name ', 'status');
   $field = array('role_name' => 'role_nameErr', 'status' => 'statusErr');
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

	$smarty->assign('description',$_POST['description']);	
	// permission validation
 	if(empty($_POST['permission'])){
 		$permissionErr = 'Please select the permissions';
 		$smarty->assign('permissionErr',$permissionErr);
 		$test = 'error';
 	}else{
 		$permission_ar = array(); 
 		$permission_ar = $_POST['permission'];
 		$smarty->assign('permission_ar',$permission_ar);
	}
	// assigning the date
	$date =  $fun->current_date();
	// query to check whether it is exist or not. 
	$query = "CALL check_role_exist('0', '".$fun->is_white_space($_POST['role_name'])."')";
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
	
	// assigning the date
	$date =  $fun->current_date();
	$created_by = 1;
	
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert role. 
			$query = "CALL add_role('".$fun->is_white_space($mysql->real_escape_str($_POST['role_name']))."',
			 '".$fun->is_white_space($mysql->real_escape_str($_POST['description']))."', 
	 		 '".$mysql->real_escape_str($_POST['status'])."', '".$date."', '".$created_by."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add role');
				}
				$row = $mysql->display_result($result);
				$roles_id = $row['inserted_id'];
				if(!empty($roles_id)){									
					// next query execution
					$mysql->next_query();
					foreach($permission_ar as $key => $val){
	
						// query to insert in to database. 
						$query = "CALL add_permissions('".$mysql->real_escape_str($roles_id)."','".$mysql->real_escape_str($val)."')";
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result2 = $mysql->execute_query($query)){ 
								throw new Exception('Problem in executing add permissions');
							}
							$row = $mysql->display_result($result2);
							// free the memory
							$mysql->clear_result($result2);
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
							die;
						}
					}
					$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list page
						 header('Location: roles.php?status=created');		
					}
				}// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				die;
			}
		}else{
			$msg = "Role name is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty drop down array for status
$smarty->assign('role_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// smarty drop down for permission
$query = "call get_permissions()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get permissions');
	}
	$permissions = array();
	while($role_permission = $mysql->display_result($result)){
    	$permissions[$role_permission['id']] = $role_permission['module_name'];    		   
	}

	$smarty->assign('permissions',$permissions);
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
$smarty->assign('page_title' , 'Add Role - AssessKey');  
$smarty->assign('page' , 'add_role');  
$smarty->assign('setting_menu','active menu-open'); 
$smarty->assign('setting_role','active menu-open'); 
// display smarty file
$smarty->display('add_role.tpl');
?>