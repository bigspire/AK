{* Purpose : To change password.
   Created : Nikitasa
   Date : 29-04-2017 *}

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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Change Password </span> </div>
            <div class="panel-body">
              				  
				  {if $SUCCESS_MSG}
               <div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$SUCCESS_MSG}
              	 </div>
			  	  {/if}
			  
              <form action="change_password.php" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Old Password</label>
                  <input id="old_password" name="old_password" value="{$old_password}" type="password" class="form-control error" required="">
                  <label for="name" class="error">{$old_passwordErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">New Password</label>
                  <input id="password" name="password" value="{$password}" type="password" class="form-control error" required="">
                  <label for="name" class="error">{$passwordErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Confirm Password</label>
                  <input id="confirm_password" name="confirm_password" value="{$confirm_password}" type="password" class="form-control error" required="">
                  <label for="name" class="error">{$confirm_passwordErr}</label>
                </div>
                <div class="form-group">
						<a href="admin_home.php"><input type="button" value="Cancel" class="btn btn-default pull-left"></a>
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