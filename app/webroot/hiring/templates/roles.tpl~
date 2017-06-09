{* Purpose : To list and search roles.
   Created : Nikitasa
   Date : 05-05-2017 *}
   
{include file='include/top.tpl'}

</head>
<body  class="datatables-page">

{include file='include/header.tpl'}

<!-- Start: Main -->
<div id="main"> 
  
{include file='include/left_menu.tpl'}
 
  <!-- Start: Content -->
  <section id="content_wrapper">
  <form action="roles.php" id="listFrm" method="post">
    <div id="content">           	 
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Roles </span> </div>
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
			<input class="submit btn  btn-xs bg-orange2" style="color:#fff;width:auto;" type="submit" value="Go">

			<a href="roles.php" class="jsRedirect">
			<input value="Reset" class="btn  btn-xs" style="width:auto;" type="button"/></a>
			
			
			<input type="hidden" id="cur_page"  value="roles.php?{$post_url}">
			<input type="hidden" id="del_page"  value="delete_role.php">
			
			</div></div>

			
			<table class="table table-striped table-bordered table-hover" id="datatable">	
           <thead>
             <tr>
               <th class="{$sort_field_role}" tabindex="0" title="Role: activate to sort column {$sort_text}" style="width:250px;"><a href="roles.php?keyword={$keyword}&field=role&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Role</a></th>                                         
					<th class="{$sort_field_status}" tabindex="0" title="Status: activate to sort column {$sort_text}" style="width: 250px;"><a href="roles.php?keyword={$keyword}&field=status&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Status</a></th>
					<th class="{$sort_field_created_date}" tabindex="0" title="Created: activate to sort column {$sort_text}" style="width: 250px;"><a href="roles.php?keyword={$keyword}&field=created_date&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Created</a></th>
					<th class="{$sort_field_modified}" tabindex="0" title="Modified: activate to sort column {$sort_text}" style="width: 150px;"><a href="roles.php?keyword={$keyword}&field=modified&order={$order}&page={$smarty.get.page}&limit={$smarty.get.limit}">Modified</a></th>	
					<th style="width: 50px;">Options</th>
             </tr>
           </thead>
                 <tbody>
                    {foreach from=$data item=item key=key}	
                    <tr>
					  			<td>{ucwords($item.role_name)}</td>
                      	<td><span class="label {$item.status_cls} mr5">{$item.status}</span></td>
                      	<td>{$item.created_date}</td>
                      	<td>{$item.modified_date}</td>
                        <td class="hidden-xs text-center">
                        <div class="btn-group">
                     
                        	<button type="button" class="btn bg-green2 btn-gradient btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-cogwheel"></span> </button>
                       			<ul class="dropdown-menu checkbox-persist pull-right text-left" role="menu">
                          		<li><a href="edit_role.php?id={$item.id}"><i class="fa fa-pencil"></i> Edit </a></li>
                          		<li><a id="{$item.id}" value="{$item.id}" class="delClick" href="javascript:void(0)" data-toggle="modal" data-target="#alertModal"><i class="fa fa-trash-o"></i> Delete </a></li>
                        		</ul>
                      	</div>
					  			</td>
                    </tr>
                    {/foreach}
						</tbody>
                </table>
                <input type="hidden" id="page" value="roles">	
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