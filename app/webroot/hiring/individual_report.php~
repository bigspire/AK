<?php
/* 
Purpose : To list the candidate
Created : Nikitasa
Date : 13-04-2017
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
if(isset($_POST['submit'])){
	$smarty->assign('download','1'); 
}
// closing database connection
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Individual Report - AssessKey');  

$smarty->assign('report_menu','active menu-open'); 

// display smarty file
$smarty->display('individual_report.tpl');