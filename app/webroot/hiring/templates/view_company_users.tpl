{* Purpose : To view company_user user.
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> View Company User ::  {ucfirst($company_user_data['contact_person'])} </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
       
	   
	   <form class="form-horizontal">
	   <div class="container col-md-12">
	   <div class="row">
   
   <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-md-3 viewBg" for="email">Contact Person:</label>
    <div class="col-sm-3 col-md-5  mt8 dataBg">
     {$company_user_data['contact_person']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Email:</label>
    <div class="col-sm-3 mt8 dataBg"> 
     {$company_user_data['email']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Phone:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$company_user_data['mobile']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Password:</label>
    <div class="col-sm-5 mt8 dataBg"> 
      {$company_user_data['password']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Role:</label>
    <div class="col-sm-5 mt8 dataBg"> 
      {$company_user_data['role_name']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Status:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$status}
    </div>
  </div>

   </div>
  </div>   
 <div class="row">
   <div class="col-sm-6">
  <br>
   <div class="form-group"> 
    <div class="col-sm-2 ml10">
		<a href="company_users.php?company_id={$smarty.get.company_id}"><input class="btn btn-default pull-left" type="button" value="Go Back"></a>				  
    </div>
  </div>
   </div>
  </div>
	 </div>					
	 </form>	
              </div>
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