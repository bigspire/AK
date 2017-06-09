{* Purpose : To list and search company.
   Created : Nikitasa
   Date : 24-04-2017 *}
   
{include file='include/top.tpl'}

</head>
<body  class="datatables-page">

{include file='include/header.tpl'}

<!-- Start: Main -->
<div id="main"> 
  
{include file='include/left_menu.tpl'}
 
  <!-- Start: Content -->
  <section id="content_wrapper">
  <form action="company.php" id="listFrm" method="post">
    <div id="content">           	 
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Companies </span> </div>
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
			<select name="state" id="state" class="searchCtrlExtra" style="width:160px;">
				<option value="">State</option>
				{html_options options=$state_id selected=$smarty.post.state}	
			</select>
			<select name="dist" id="dist" class="searchCtrlExtra" style="width:130px;">
				<option value="">District</option>
				{html_options options=$dist_id selected=$smarty.post.dist}			 
			</select>
			<select name="status" class="searchCtrlExtra" style="width:75px;">
				{html_options options=$company_status selected=$status}	
			</select>

			<input type="text" style="width:90px;" class="datepick" name="f_date" value="{$f_date}" placeholder="From Date">
			<input type="text" style="width:90px;" class="datepick" name="t_date" value="{$t_date}" placeholder="To Date">
			<input class="submit btn  btn-xs bg-orange2" style="color:#fff;width:auto;" type="submit" value="Go">

			<a href="company.php" class="jsRedirect"><input value="Reset" class="btn  btn-xs" style="width:auto;" type="button"/></a>
			
			{if !$ALERT_MSG}
				<a href="company.php?action=export&keyword={$smarty.post.keyword}&state={$smarty.post.state}
				&district={$smarty.post.dist}&f_date={$smarty.post.f_date}&t_date={$smarty.post.t_date}&status={$smarty.post.status}">
				<input type="button" val="company.php?action=export&keyword={$smarty.post.keyword}&state={$smarty.post.state}&district={$smarty.post.dist}&f_date={$smarty.post.f_date}&t_date={$smarty.post.t_date}&status={$smarty.post.status}"
				name="export" class="jsRedirect btn  btn-xs bg-orange2 " style="color:#fff;width:auto;" value="Export"></a>
			{/if}
			
			<input type="hidden" id="cur_page"  value="company.php?{$post_url}">
			<input type="hidden" id="del_page"  value="delete_company.php">
			
			</div></div>

			<table class="table table-striped table-bordered table-hover" id="datatable">	
           <thead>
             <tr>
			<th class="{$sort_field_company_name}" tabindex="0" title="Company Name: activate to sort column {$sort_text}" style="width:250px;">
			<a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=company_name&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Company Name</a></th>                                         
					 		<th class="{$sort_field_email}" tabindex="0" title="Email Name: activate to sort column {$sort_text}" style="width: 250px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=email&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Email</a></th>
							<th class="{$sort_field_phone}" tabindex="0" title="Phone: activate to sort column {$sort_text}" style="width: 250px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=phone&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Phone</a></th>
							<th class="{$sort_field_users}" tabindex="0" title="No. of Users: activate to sort column {$sort_text}" style="width: 150px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=users&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">No. Users</a></th>
							<th class="{$sort_field_district_name}" tabindex="0" title="City: activate to sort column {$sort_text}" style="width: 150px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=district_name&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Location</a></th>
							<th class="{$sort_field_status}" tabindex="0" title="Status: activate to sort column {$sort_text}" style="width: 150px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=status&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Status</a></th>
							<th class="{$sort_field_created_date}" tabindex="0" title="Created: activate to sort column {$sort_text}" style="width: 150px;"><a href="company.php?keyword={$keyword}&state={$state}
				&district={$district}&f_date={$f_date}&t_date={$t_date}&status={$status}&field=created_date&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Created</a></th>
							<th width="50">Options</th>
             </tr>
           </thead>
                 <tbody>
                    {foreach from=$data item=item key=key}	
                   <tr>
                      <td><a href="view_company.php?id={$item.id}">{ucwords($item.company_name)}</a></td>                                         
                      <td>{$item.email}</td>
                      <td>{$item.phone}</td>
                      <td><a href="company_users.php?company_id={$item.id}">{if $item.users > '0'}{$item.users}{/if}</a></td>
                      <td>{$item.district_name}</td>
                      <td><span class="label {$item.status_cls} mr5">{$item.status}</span></td>
                      <td>{$item.created_date}</td>
                        <td class="hidden-xs text-center">
                        <div class="btn-group">
                     
                        	<button type="button" class="btn bg-green2 btn-gradient btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-cogwheel"></span> </button>
                       			<ul class="dropdown-menu checkbox-persist pull-right text-left" role="menu">
                          		<li><a href="edit_company.php?id={$item.id}"><i class="fa fa-pencil"></i> Edit </a></li>
                          		<li><a id="{$item.id}" value="{$item.id}" class="delClick" href="javascript:void(0)" data-toggle="modal" data-target="#alertModal"><i class="fa fa-trash-o"></i> Delete </a></li>
                        		<li><a href="add_company_user.php?company_id={$item.id}"><i class="glyphicons glyphicons-user"></i> Add User </a></li>
                        		</ul>
                      	</div>
					  			</td>
                    </tr>
                    {/foreach}
						</tbody>
                </table>
                <input type="hidden" id="page" value="company">	
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
