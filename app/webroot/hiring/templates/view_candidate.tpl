{* Purpose : To view candidate.
   Created : Nikitasa
   Date : 17-04-2017 *}

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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> View Candidate ::  {ucfirst($candidate_data['first_name'])} </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
       
	   
	   <form class="form-horizontal">
	   <div class="container col-md-12">
	   <div class="row">
   
   <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-md-3 viewBg" for="email">Company Name:</label>
    <div class="col-sm-3 col-md-5  mt8 dataBg">
     {$candidate_data['company_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Project Name:</label>
    <div class="col-sm-3 mt8 dataBg"> 
     {$candidate_data['project_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Drive Name:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['drive_name']}
    </div>
  </div>
  
 
  
  
   </div>
  
  <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">Email:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$candidate_data['email_id']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Mobile:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['mobile']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">State:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['state_name']}
    </div>
  </div>
  
  
  
  
   </div>
  
   
  

   
  </div>
      
 <div class="row">
   
   <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">First Name:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$candidate_data['first_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Last Name:</label>
    <div class="col-sm-3 mt8 dataBg"> 
     {$candidate_data['last_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Emp Id:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['emp_code']}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Department:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['department']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Designation:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$candidate_data['designation']}
    </div>
  </div>
  
  <br>
   <div class="form-group"> 
    <div class="col-sm-2 ml10">
		<a href="candidate.php"><input class="btn btn-default pull-left" type="button" value="Go Back"></a>				  
    </div>
  </div>
  
  
   </div>
  
  <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">District:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$candidate_data['district_name']}
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
