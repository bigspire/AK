<?php
error_reporting(0);
ini_set('display_errors', '0');
class web_function{
	/* function to enable main menu */
	function set_menu_active($page){
		$file_name = basename($_SERVER['REQUEST_URI']);
		if($file_name == $page.'.php'){	
			return 'active menu-open';
		}else{
			return '';
		}
	}
		
}
$wfn = new web_function();
?>