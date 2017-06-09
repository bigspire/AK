{* Purpose : To edit company user.
   Created : Nikitasa
   Date : 28-04-2017 *}

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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Companies >> Edit Company User </span> </div>
            <div class="panel-body">
            {if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}			  
              <form action="edit_company_user.php?id={$getid}&company_id={$smarty.get.company_id}" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Contact Person <span class="mandate">*</span></label>
                  <input name="contact_person" value="{$contact_person}" type="text" class="form-control error" required="">
                  <label for="name" class="error">{$contact_personErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Email <span class="mandate">*</span></label>
                  <input id="email" name="email" value="{$email}" type="text" class="form-control error" required="">
				  <label for="name" class="error">{$emailErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Mobile <span class="mandate">*</span></label>
                  <input name="mobile" value="{$mobile}" type="text" class="form-control error" required="">
				  <label for="name" class="error">{$mobileErr}</label>
                </div>
				 <div class="form-group">
                  <label for="name"> Password <span class="mandate">*</span></label>
                  <input  name="password" value="{if $password}{$password}{else}{$smarty.post.password}{/if}" type="password" class="form-control error" required="">
              <label for="name" class="error">{$passwordErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Confirm Password <span class="mandate">*</span></label>
                  <input name="confirm_password" value="{if $confirm_password}{$confirm_password}{else}{$password}{/if}" type="password" class="form-control error" required="">
						<label for="name" class="error">{$confirm_passwordErr}</label>
                </div>
                 <div class="form-group">
                  <label for="name">Role <span class="mandate">*</span></label>
                  <select  name="role"  class="form-control">
                  <option value="">Select</option>
				  			{html_options options=$roles selected=$role}	 
						</select>
 						<label for="name" class="error">{$roleErr}</label>
                </div>
                 <div class="form-group">
                  <label>Status <span class="mandate">*</span></label>
                  <select id="status" name="status" class="form-control">
								{html_options options=$company_user_status selected=$status}	
				 		</select>
              </div>
                <div class="form-group">
			  			<input type="button" value="Cancel" class="btn btn-default pull-left"  onclick="window.location='company_users.php?company_id={$smarty.get.company_id}'">
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