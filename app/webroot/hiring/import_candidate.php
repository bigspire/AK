<?php
/* 
Purpose : To import candidate
Created : Nikitasa
Date : 09-05-2017
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
	// array for printing correct field name in error message
	$fieldtype = array('1', '1' ,'1');
	$actualfield = array('company name','project name', 'drive name');
    $field = array('company' => 'companyErr','project' => 'projectErr','drive' => 'driveErr');
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
	
	// attach excel validation
	if(!isset($_POST['attachment']) && empty($_FILES['attachment']['name'])){
		$smarty->assign('attachErr', 'Please attach the excel');	
		$test = 'error';		
	}	
	
	$req_size =  5242880;

	// upload the file if attached
	if(!empty($_FILES['attachment']['name'])){
		// upload directory
		$uploaddir = '../uploads/candidate/'; 
		$attachmentsize = $_FILES['attachment']['size'];
		$attachmenttype = pathinfo($_FILES['attachment']['name']);
		$extension = $attachmenttype['extension'];	
		// file extensions
		$extensions = array('xlsx',); 
		
		// checking the file extension is doc,docx
		if($fun->extension_validation($extension,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be xlsx';
			$test = 'error';
		}
		// checking the file size is less than 5 MB		
		else if($fun->size_validation($attachmentsize,$req_size)){
			$attachmentuploadErr = 'Attachment file size must be less than 5 MB';
			$test = 'error';
		}
		// checking the file size is less than 5 MB		
		else if(empty($attachmentsize)){
			$attachmentuploadErr = 'Attachment file size must be less than 5 MB';
			$test = 'error';
		}				
	}	
	$smarty->assign('attachmentuploadErr', $attachmentuploadErr);
	
	// assigning the date
	$date =  $fun->current_date();
	$created_by = 1;
	
	if(empty($test)){	
		//update the attached file
		$new_file = $_FILES['attachment']['name'];
		// upload the file
		$path = $uploaddir.$new_file;
		move_uploaded_file($_FILES['attachment']['tmp_name'], $path);	
		
		// get excel data
		include('classes/class.excel.php');
		$excelObj = new libExcel();
		$data = $excelObj->read_data($path);
		// iterate excel array
		foreach($data as $key =>  $candidate){	
			// skip the headers and title
			if($key >= 2){
				// query to check whether email/mobile is exist or not. 
				$query = "CALL check_candidate_exist('0', '".$candidate['F']."', '".$candidate['G']."')";
				// Calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in executing to check email/mobile exist');
					}
					$row = $mysql->display_result($result);
					// call the next result
					if($row['total'] == '0'){
						// free the memory
						$mysql->clear_result($result);
						$mysql->next_query();
						// insert candidate
						$status = $candidate['J'] == 'active' ? '1' : '0';
						// smarty drop down for District
						$query = "CALL get_district_byname('".$candidate['I']."')";
						try{
							// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in executing district');
							}
							$dist_result = $mysql->display_result($result);
							// free the memory
							$mysql->clear_result($result);
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
						// free the memory
						$mysql->next_query();
						// query to insert candidate details.
						$query = "CALL add_candidate('".$mysql->real_escape_str($_POST['drive'])."',
										'".$fun->is_white_space($mysql->real_escape_str($candidate['A']))."',
										'".$fun->is_white_space($mysql->real_escape_str($candidate['B']))."',
										'".$fun->is_white_space($mysql->real_escape_str($candidate['C']))."',
										'".$fun->is_white_space($mysql->real_escape_str($candidate['D']))."',
										'".$fun->is_white_space($mysql->real_escape_str($candidate['E']))."',
										'".$mysql->real_escape_str($candidate['F'])."','".$mysql->real_escape_str($candidate['G'])."',
										'".$mysql->real_escape_str($dist_result['id'])."','".$mysql->real_escape_str($status)."',
										'".$created_by."','".$date."')";

						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in executing add candidate');
							}
							$row = $mysql->display_result($result);
							$last_id = $row['inserted_id'];							
							// free the memory
							$mysql->clear_result($result);
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
					}else{
						$mysql->clear_result($result);
						$mysql->next_query();
						$msg = "Candidate(s) are already exists";
						$smarty->assign('EXIST_MSG',$msg); 
					}
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				} 
			}
		}		
		// redirecting to list users page
		header('Location: candidate.php?current_status=imported');		
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



// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Import Candidate - AssessKey');  

$smarty->assign('candidate_menu','active menu-open'); 

// display smarty file
$smarty->display('import_candidate.tpl');
?>