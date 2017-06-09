<?php
/* 
Purpose : To Delete company user.
Created : Nikitasa
Date : 28-04-2017
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

if(isset($_POST['del_id'])){
   // get record id   
	$id = $_POST['del_id'];
	$company_id = $_GET['company_id'];
	if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
	}

   // delete record details
 	$query = "CALL delete_company_user('".$id."','".$company_id."')";
  	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in deleting company user');
		}  
  		header('Location:company_users.php?company_id='.$company_id.'&page='.$_GET['page'].'&current_status=deleted');	
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
$c_c = $mysql->close_connection();
?>