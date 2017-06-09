{* Purpose : To view project.
   Created : Nikitasa
   Date : 25-04-2017 *}

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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> View Project ::  {$project_data['project_name']} </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
       
	   
	   <form class="form-horizontal">
	   <div class="container col-md-12">
	   <div class="row">
   
   <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Project Name:</label>
    <div class="col-sm-3 mt8 dataBg"> 
     {$project_data['project_name']}
    </div>
  	</div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Company:</label>
    <div class="col-sm-3 mt8 dataBg"> 
      {$project_data['company_name']}
    </div>
  </div>
   <div class="form-group">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="pwd">Test Details:</label>
    <div class="col-sm-3 mt8 dataBg"> 
    {foreach from=$data item=item key=key}
      {$item.test_name}
    {/foreach}
    </div>
  </div>
 
  
  <br>
   <div class="form-group"> 
    <div class="col-sm-2 ml10">
		<a href="project.php"><input class="btn btn-default pull-left" type="button" value="Go Back"></a>				  
    </div>
  </div>
   </div>
  
  <div class="col-sm-6">
   <div class="form-group textLeft">
    <label class="control-label  textLeft ml20 col-sm-3 viewBg" for="email">Project Description:</label>
    <div class="col-sm-3 mt8 dataBg">
     {$project_data['project_desc']}
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