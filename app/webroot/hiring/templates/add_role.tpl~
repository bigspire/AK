{* Purpose : To add role.
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
  
    <div id="content">
     
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Add Role </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
              <form action="add_role.php" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                
                <div class="form-group">
                  <label for="name">Role Name <span class="mandate">*</span></label>
                  <input id="role_name" name="role_name" value="{$role_name}" type="text" class="form-control error" required="">
                  <label for="name" class="error">{$role_nameErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Permissions <span class="mandate">*</span></label>
                  <select  name="permission[]" style="width:97%" multiple="multiple" size="10" separator="  " class="multi_select form-control" id="RolePermission">
				  			{html_options options=$permissions selected=$permission_ar}		 
						</select>
 						<label for="name" class="error">{$permissionErr}</label>
                </div>
				<div class="form-group">
                  <label> Description </label>
                  <textarea id="description" name="description" class="form-control">{$smarty.post.description}</textarea>
                </div>
				 
				 <div class="form-group">
                  <label>Status <span class="mandate">*</span></label>
                  <select id="status" name="status" class="form-control">
				   		{if isset($status)}
								{html_options options=$role_status selected=$status}	
							{else}
								{html_options options=$role_status selected='1'}	
							{/if}
				 		</select>
              </div>

              <div class="form-group">
				 		<a href="roles.php" class="jsRedirect"><input class="btn btn-default pull-left"  type="button" value="Cancel"></a>
                  <input class="submit btn bg-orange2 pull-right" type="submit" value="Submit">
              </div>
			
              </form>
			</div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
   </div>
  </section>
  </div>
<!-- End #Main --> 
{include file='include/footer_js.tpl'}
</body>
</html>