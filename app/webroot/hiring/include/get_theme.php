<?php 
/* 
Purpose : To display theme
Created : Nikitasa 
Date : 29-04-2017
*/
// Connecting Database
$mysql->connect_database();

$user_id = '1';
// validate url 
if(($fun->isnumeric($user_id)) || ($fun->is_empty($user_id)) || ($user_id == 0)){
  header('Location:page_error.php');
}

if($_SESSION['theme'] == ''){
	// get database values
	$query = "CALL get_configuration_byid('$user_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing configuration');
		}
		$configuration_data = $mysql->display_result($result);
		$_SESSION['theme_color'] = $configuration_data['theme'];
		$smarty->assign('theme',$_SESSION['theme_color']);
		$_SESSION['rec_page'] = $configuration_data['rec_page'];
		$smarty->assign('rec_page',$_SESSION['rec_page']);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	$smarty->assign('theme',$_SESSION['theme']);
	$smarty->assign('rec_page',$_SESSION['rec_page']);
}
?>