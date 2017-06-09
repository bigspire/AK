{* Purpose : To view company.
   Created : Nikitasa
   Date : 21-04-2017 *}
   
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> View Company ::  {ucfirst($company_data['company_name'])} </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
       
	   
	   <form class="form-horizontal">
	   <div class="container col-md-12">
	   <div class="row">
   
   <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-md-3 viewBg" for="email">Company Name:</label>
    <div class="col-sm-3 col-md-5  mt8 dataBg">
     {$company_data['company_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Email:</label>
    <div class="col-sm-3 mt8 dataBg"> 
     {$company_data['email']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Phone:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$company_data['phone']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Address:</label>
    <div class="col-sm-5 mt8 dataBg"> 
      {$company_data['address']}
    </div>
  </div>
  <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">WebSite:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$company_data['website']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Company Profile:</label>
    <div class="col-sm-5 mt8 dataBg"> 
     {nl2br($company_data['company_profile'])}
    </div>
  </div>
   </div>
  
  <div class="col-sm-6">
  <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">State:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$company_data['state_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">District:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$company_data['district_name']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">PO Number:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$company_data['po_no']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Contract Validity:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$validity}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Scope of Work:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$company_data['scope_work']}
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
		<a href="company.php"><input class="btn btn-default pull-left" type="button" value="Go Back"></a>				  
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
