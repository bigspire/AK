<?php
session_start(); 
error_reporting(0);
// remote search
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

//get search term
$keyword = $_GET['term'];

if($_GET['page'] == 'candidate'){
	// get matched data from candidate
	$query = "CALL search_candidate('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing candidate page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['first_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['last_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['email_id']));
			$data[] = strtolower($fun->match_results($keyword,$obj['mobile']));
			$data[] = strtolower($fun->match_results($keyword,$obj['district_name']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'roles'){
	// get matched data from role
	$query = "CALL search_role('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing role page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['role_name']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'project'){
	// get matched data from project
	$query = "CALL search_project('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing project page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['project_name']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'company'){
	// get matched data from company
	$query = "CALL search_company('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing company page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['company_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['email']));
			$data[] = strtolower($fun->match_results($keyword,$obj['phone']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'drive'){
	// get matched data from drive
	$query = "CALL search_drive('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing drive page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['project_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['drive_name']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'company_users'){
	// get matched data from company users
	$query = "CALL search_company_user('".$keyword."','".$_GET['company_id']."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing company users page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['contact_person']));
			$data[] = strtolower($fun->match_results($keyword,$obj['email']));
			$data[] = strtolower($fun->match_results($keyword,$obj['mobile']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}

if(!empty($unique)){
	echo json_encode($unique); 
}else{
	$no_data[] = 'No Results!';
	echo json_encode($no_data); 
}
// calling mysql close db connection function
$c_c = $mysql->close_connection(); 
?>