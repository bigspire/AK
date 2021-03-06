<?php
/* 
Purpose : To list the company users
Created : Nikitasa
Date : 28-04-2017
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

// get record id   
$id = $_GET['company_id'];
if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
}

// query to fetch all companies name. 
$query = "CALL get_company_name('".$id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing company');
	}
	$row = $mysql->display_result($result);
 	$companies = $row['company_name'];
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];

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
	$post_url .= '&company_id='.$id;
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&status='.$status;
	$smarty->assign('post_url', $post_url);
}else{
	$get_url .= '&company_id='.$id;
	$get_url .= '&keyword='.$keyword;
	$get_url .= '&status='.$status;
	$smarty->assign('post_url', $get_url);
}

// count the total no. of records
$query = "CALL list_company_users('".$id."','".$keyword."','".$status."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list company users page');
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
$sort_fields = array('contact_person','email','mobile','status','created_date');
$org_fields = array('contact_person','email','mobile','status','created_date');

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
	$field = 'cu.created_date';			
	$smarty->assign('sort_field_created_date', 'sorting_desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
$search_key = array_search($_GET['field'], $sort_fields);
if($search_key  !== FALSE){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query =  "CALL list_company_users('".$id."','".$keyword."','".$status."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list company users page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
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
      $excelObj->printHeader($header = array('Contact Person','Email','Mobile','Status','Created') ,$col = array('A','B','C','D','E'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E'), $field = array('contact_person','email','mobile','status','created_date'),'Company Users_'.$companies.'_'.$current_date);
	}
	
	// create validation
	if($_GET['current_status'] == 'created' || $_GET['status'] == 'current_status' || $_GET['current_status'] == 'deleted'){
 	 $success_msg = 'Company User ' . $_GET['current_status'] . ' successfully';
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

$paging->posturl($post_url);

// status drop down
$smarty->assign('company_users_status', array('' => 'Status', '1' => 'Active', '2' => 'Inactive'));

$smarty->assign('show_pages',array('10' => '10','20' => '20','25' => '25','50' => '50',
'100' => '100','200' => '200','250' => '250','500' => '500','-1' => 'All'));

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());

$smarty->assign('id' , $id); 
$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 		
$smarty->assign('status' , $status); 
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);

// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Company Users - AssessKey');  

$smarty->assign('company_menu','active menu-open'); 

// display smarty file
$smarty->display('company_users.tpl');
?>