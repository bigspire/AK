<?php
/* 
Purpose : To paginate list and search software details.
Created : Nikitasa
Date : 08-06-2016
*/

	//retain the page number.
	if($_GET['page'.$paging_no]){
		$smarty->assign('retain_pageno', $_GET['page'.$paging_no]);
		$page_num = $_GET['page'.$paging_no];
	}
	else{
	
		$smarty->assign('retain_pageno', 1);
		$page_num =1;
	}
	
	$smarty->assign('cur_url',$_SERVER['PHP_SELF']);
    
	$paging = new paging($limit==''?5:$limit,5,'Prev','Next','%%number%%',$paging_n,$post_url);

	$paging->query($count);

	$page_details = $paging->print_info();
	$start = 0;
	$end = $limit==''?5:$limit;
	$page = $_GET["page$paging_no"];
	//$order = 'desc';
	$page = ($page >= 1) ? ($page - 1) : $page;
	$start = $page * $end;
	if($start >= $count) {
		$start = 0;
	}
	
	$page_details[] = $page_details['total_pages'];
	$int = intval(preg_replace('/[^0-9]+/', '', $page_details), 10);
	
	// show only when page available
	if($page_details['total_pages']){
		$smarty->assign('page_info'.$paging_no,"Showing <span> $page_num </span> to <span> $int</span> 
		of <span>$page_details[total]</span> entries");
	}
	$smarty->assign('all_records',$count);
?>