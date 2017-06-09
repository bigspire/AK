{* Purpose : To edit profile.
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Edit Profile </span> </div>
            <div class="panel-body">
              
              {if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	  {/if}
				  
				  {if $SUCCESS_MSG}
               <div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$SUCCESS_MSG}
              	 </div>
			  	  {/if}			  		
			  		
              <form action="edit_profile.php" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Full Name <span class="mandate">*</span></label>
                  <input id="full_name" name="full_name" value="{$full_name}" type="text" class="form-control error" required="">
                	<label for="name" class="error">{$full_nameErr}</label>
                </div>
               <div class="form-group">
                  <label for="name">Email <span class="mandate">*</span></label>
                  <input id="email_id" name="email_id" value="{$email_id}" type="text" class="form-control error" required="">
                	<label for="name" class="error">{$emailErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Mobile <span class="mandate">*</span></label>
                  <input id="mobile" name="mobile" value="{$mobile}" type="text" class="form-control error" required="">
                	<label for="name" class="error">{$mobileErr}</label>
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
  	<br><br><br><br><br><br><br><br><br><br>
 
 
  
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
          <button type="button" class="btn btn-success btn-gradient mr5" data-dismiss="modal"><i class="fa fa-check"></i> Yes</button>
          <button type="button" class="btn btn-danger btn-gradient" data-dismiss="modal"><i class="fa fa-warning"></i> No</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
