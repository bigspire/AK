{* Purpose : To list and search candidate.
   Created : Nikitasa
   Date : 18-04-2017 *}
   
{include file='include/top.tpl'}

</head>
<body  class="datatables-page">

{include file='include/header.tpl'}

<!-- Start: Main -->
<div id="main"> 
  
{include file='include/left_menu.tpl'}
 
  <!-- Start: Content -->
  <section id="content_wrapper">
  <form action="candidate.php" id="listFrm" method="post">
    <div id="content">           	 
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Candidates </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
                
              	 {if $SUCCESS_MSG}
                <div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <strong>Well done!</strong> {$SUCCESS_MSG}
              	 </div>
              	 {/if}
              	 
              	 {if $ALERT_MSG}
                <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$ALERT_MSG}
              	 </div>
              	 {/if}
						
		<div class="panel-menu dt-panelmenu">
			<div class="dataTables_length" id="datatable_length">
			
			
			<select name="datatable_length" aria-controls="datatable" class="filterPage searchCtrlExtra">
			<option value="" selected="selected">Show</option>
			{html_options options=$show_pages selected=$smarty.get.limit}	
			</select>
			</div>
			
			<div id="datatable_filter" class="dataTables_filter">
			
			
			<input type="text" style="width:180px;" name="keyword" value="{$keyword}" id="keyword" placeholder="Enter Filter Terms Here....">
			<select name="company" id="company" class="searchCtrlExtra" style="width:160px;">
				<option value="">Company</option>
				{html_options options=$companies selected=$smarty.post.company}	
			</select>
			<select name="project" id="project" class="searchCtrlExtra" style="width:130px;">
				<option value="">Project</option>
				{html_options options=$projects selected=$smarty.post.project}			 
			</select>
			<select name="drive" id="drive" class="searchCtrlExtra" style="width:130px;">
				<option value="">Drive</option>
				{html_options options=$drives selected=$smarty.post.drive}			 
			</select>

			<input type="text" style="width:90px;" class="datepick" name="f_date" value="{$f_date}" placeholder="From Date">
			<input type="text" style="width:90px;" class="datepick" name="t_date" value="{$t_date}" placeholder="To Date">
			<select name="status" class="searchCtrlExtra" style="width:75px;">
				{html_options options=$candidate_status selected=$status}	
			</select>
			<input class="submit btn  btn-xs bg-orange2" style="color:#fff;width:auto;" type="submit" value="Go">

			<a href="candidate.php" class="jsRedirect"><input value="Reset" class="btn  btn-xs" style="width:auto;" type="button"/></a>
			
			{if !$ALERT_MSG}
				<a href="candidate.php?action=export&keyword={$smarty.post.keyword}&company={$smarty.post.company}
				&project={$smarty.post.project}&drive={$smarty.post.drive}&f_date={$smarty.post.f_date}&t_date={$smarty.post.t_date}">
				<input type="button" val="candidate.php?action=export&keyword={$smarty.post.keyword}&company={$smarty.post.company}={$smarty.post.project}&drive={$smarty.post.drive}&f_date={$smarty.post.f_date}&t_date={$smarty.post.t_date}"
				name="export" class="jsRedirect btn  btn-xs bg-orange2 " style="color:#fff;width:auto;" value="Export"></a>
			{/if}
			
			<input type="hidden" id="cur_page"  value="candidate.php?{$post_url}">
			<a href="import_candidate.php"><input class="submit btn  btn-xs bg-orange2 pad4" style="color:#fff;width:auto;" type="button" value="Import"></a>
			<input type="hidden" id="del_page"  value="delete_candidate.php">
			
			</div></div>

			
			<table class="table table-striped table-bordered table-hover" id="datatable">	
           <thead>
             <tr>
              <th class="{$sort_field_first_name}" tabindex="0" title="First Name: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=first_name&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">First Name</a></th>                                         
					<th class="{$sort_field_last_name}" tabindex="0" title="Last Name: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=last_name&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Last Name</a></th>  
					<th class="{$sort_field_emp_id}" tabindex="0" title="Emp Id: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=emp_id&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Emp Id</a></th> 
					<th class="{$sort_field_email}" tabindex="0" title="Email: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=email&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Email</a></th>  
					<th class="{$sort_field_mobile}" tabindex="0" title="Mobile: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=mobile&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Mobile</a></th>  
					<th class="{$sort_field_location}" tabindex="0" title="Location: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=location&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Location</a></th>  
					<th class="{$sort_field_status}" tabindex="0" title="Status: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=status&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Status</a></th>  
					<th class="{$sort_field_created_date}" tabindex="0" title="Created: activate to sort column {$sort_text}" style="width:181px;"><a href="candidate.php?keyword={$keyword}&company={$company}&project={$project}&drive={$drive}&status={$status}&field=created_date&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Created</a></th>  
					<th>Options</th>
             </tr>
           </thead>
                 <tbody>
                    {foreach from=$data item=item key=key}	
                    <tr>
					  			<td><a href="view_candidate.php?id={$item.id}">{ucfirst($item.first_name)}</a></td>
                      	<td>{ucfirst($item.last_name)} </td>
                      	<td>{$item.emp_code}</td>
					  			<td>{$item.email_id}</td>
					  			<td>{$item.mobile}</td>
					 		   <td>{$item.district_name}</td>
                      	 <td><span class="label {$item.status_cls} mr5">{$item.status}</span></td>
                      	<td>{$item.created_date}</td>
                        <td class="hidden-xs text-center">
                        <div class="btn-group">
                     
                        	<button type="button" class="btn bg-green2 btn-gradient btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-cogwheel"></span> </button>
                       			<ul class="dropdown-menu checkbox-persist pull-right text-left" role="menu">
                          		<li><a href="edit_candidate.php?id={$item.id}"><i class="fa fa-pencil"></i> Edit </a></li>
                          		<li><a id="{$item.id}" value="{$item.id}" class="delClick" href="javascript:void(0)" data-toggle="modal" data-target="#alertModal"><i class="fa fa-trash-o"></i> Delete </a></li>
                        		</ul>
                      	</div>
					  			</td>
                    </tr>
                    {/foreach}
						</tbody>
                </table>
                <input type="hidden" id="page" value="candidate">	
				<input type="hidden" name="del_id" id="del_id">
<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">{$page_info}</div>
<div class="dataTables_paginate paging_bs_normal" id="datatable_paginate">
<ul class="pagination pagination-sm">
{$page_links}</ul>
</div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
     

   </div>
   
   </form>
  
  </section>
  
 
  
  </div>
<!-- End #Main --> 

{include file='include/footer_js.tpl'}


<div class="modal fade" id="alertModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Are you sure you want to delete?</h4>
      </div>
      <div class="modal-body">
        <div class="form-group text-center">
          <button type="button" class="btn btn-success btnDelete btn-gradient mr5" data-dismiss="modal"><i class="fa fa-check"></i> Yes</button>
          <button type="button" class="btn btn-danger btn-gradient" data-dismiss="modal"><i class="fa fa-warning"></i> No</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
