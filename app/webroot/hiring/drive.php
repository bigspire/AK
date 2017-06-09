<?php
/* 
Purpose : To list the drive
Created : Nikitasa
Date : 26-04-2017
*/

// start session
session_start();
//unset session
session_destroy();
// include smarty configuration file
include 'configs/smartyconfig.php';
// including database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// including function class file
include('classes/class.function.php');
// including theme file
include 'include/get_theme.php';
// include paging class 
include('classes/class.paging.php');
// Authenticating current user
if($_SESSION['back_end'] == ''){
  // header('location:login.php');
}

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];
$company = $_POST['company'] ? $_POST['company'] : $_GET['company'];
$state = $_POST['state'] ? $_POST['state'] : $_GET['state'];
$district = $_POST['dist'] ? $_POST['dist'] : $_GET['dist'];
$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];  
$t_date = $_POST['t_date'] ? $_POST['t_date'] : $_GET['t_date']; 
$from_date = $fun->convert_date($f_date);
$to_date = $fun->convert_date($t_date);

// to display the data using status filter
if(isset($_POST['status'])){
	$status = $_POST['status'];
}else if(isset($_GET['status'])){
	$status = $_GET['status'];
}else{
	$status = '1';
}

// post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
	$post_url .= '&company='.$company;
	$post_url .= '&state='.$state;
	$post_url .= '&district='.$district;
	$post_url .= '&status='.$status;
	$smarty->assign('post_url', $post_url);
}else{
	$get_url .= '&keyword='.$keyword;
	$get_url .= '&f_date='.$f_date;
	$get_url .= '&t_date='.$t_date;
	$get_url .= '&state='.$state;
	$get_url .= '&district='.$district;
	$get_url .= '&status='.$status;	
	$smarty->assign('post_url', $get_url);
}

// count the total no. of records
$query = "CALL list_drive('".$keyword."','".$company."','".$state."','".$district."','".$from_date."','".$to_date."','".$status."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list drive page');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details is not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = $_GET['limit'] ? $_GET['limit'] : $_SESSION['rec_page'];

    include('paging_call.php');	
	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// set the condition to check ascending or descending order		
$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';	
$sort_text = ($_GET['order'] == 'desc' ? 'descending' : ($_GET['order'] == 'asc' ? 'ascending' : ''));	
$sort_fields = array('drive_name','company_name','project_name','location','drive_date','status','created_date');
$org_fields = array('drive_name','company_name','project_name','district_name','drive_from','status','created_date');

// to set the sorting image
foreach($sort_fields as $key => $b_field){
	if($b_field != $_GET['field']){
		$smarty->assign('sort_field_'.$b_field,'sorting');
	}else{	
		$order_img = ($_GET['order'] == 'asc') ? 'sorting_desc' :  'sorting_asc';
		$smarty->assign('sort_field_'.$b_field,$order_img);
	}			
}

$smarty->assign('sort_text', $sort_text);

// if no fields are set, set default sort image
if(empty($_GET['field'])){		
	$order = 'desc';			
	$field = 'd.created_date';			
	$smarty->assign('sort_field_created_date', 'sorting_desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
$search_key = array_search($_GET['field'], $sort_fields);
if($search_key  !== FALSE){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query =  "CALL list_drive('".$keyword."','".$company."','".$state."','".$district."','".$from_date."','".$to_date."','".$status."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list drive page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
 		$data[$i]['drive_date'] = $fun->drive_date($obj['drive_from']).' - '.$fun->drive_date($obj['drive_to']);
 		$data[$i]['status'] = $fun->display_status($obj['status']);
 		$data[$i]['status_cls'] = $fun->status_cls($obj['status']);
 		$i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}
	
	// get current date 
	$current_date = $fun->display_date();
	
	// call to export the excel data
	if($_GET['action'] == 'export'){ 
		include('classes/class.excel.php');
		$excelObj = new libExcel();
		// function to print the excel header
      $excelObj->printHeader($header = array('Drive Name','Company Name','Project Name','Location','Drive Date','Status','Created') ,$col = array('A','B','C','D','E','F','G'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E','F','G'), $field = array('drive_name','company_name','project_name','district_name','drive_date','status','created_date'),'Drives_'.$current_date);
	}	
	
	// create validation
	if($_GET['current_status'] == 'created' || $_GET['current_status'] == 'updated' || $_GET['current_status'] == 'deleted'){
 	   $success_msg = 'Drive ' . $_GET['current_status'] . ' successfully';
	}else if($_GET['current_status'] == 'msg'){
	   $alert_msg = 'This details is not in our database';
	}

	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
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
    	// $states_id[] = $state['id'];    		   
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
$paging->posturl($post_url);

// status drop down
$smarty->assign('drive_status', array('' => 'Status', '1' => 'Active', '2' => 'Inactive'));
$smarty->assign('show_pages',array('10' => '10','20' => '20','25' => '25','50' => '50',
'100' => '100','200' => '200','250' => '250','500' => '500','-1' => 'All'));
// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());

$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 	
$smarty->assign('company' , $company); 	
$smarty->assign('state' , $state); 	
$smarty->assign('dist' , $district); 		
$smarty->assign('status' , $status); 	
$smarty->assign('f_date', $f_date);
$smarty->assign('t_date', $t_date);
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Drive - AssessKey');  

$smarty->assign('drive_menu','active menu-open'); 

// display smarty file
$smarty->display('drive.tpl');
?>