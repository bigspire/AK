{* Purpose : To add project.
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Add Project </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Project Name <span class="mandate">*</span></label>
                  <input id="project_name" name="project_name" value="{$project_name}" type="text" class="form-control error" required="">
                	<label for="name" class="error">{$projectErr}</label>
                </div>
                <div class="form-group">
                  <label for="wage">Company <span class="mandate">*</span></label>
                   <select  name="company" class="form-control" id="company">
				   		<option value="">Select</option>
							{html_options options=$companies selected=$smarty.post.company}	
						</select>
				  		<label for="name" class="error">{$companyErr}</label>
                </div>
                <div class="form-group">
                  <label> Project Description </label>
                  <textarea  name="project_desc" class="form-control">{$smarty.post.project_desc}</textarea>
                  <label for="name" class="error">{$company_descErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Test Details <span class="mandate">*</span></label>
                  <select  name="test_detail[]" style="width:97%" multiple="multiple" size="10" separator="  " class="multi_select form-control">
				  			{html_options options=$test_details selected=$test_detail_ar}		 
						</select>
 						<label for="name" class="error">{$test_detailErr}</label>
                </div>
				 <div class="form-group">
                  <label> Status <span class="mandate">*</span></label>
                    <select id="status" name="status" class="form-control">
				   		{if isset($status)}
								{html_options options=$project_status selected=$status}	
							{else}
								{html_options options=$project_status selected='1'}	
							{/if}
				 		</select>
                </div>
                <div class="form-group">
				 <input type="button" value="Cancel" class="btn btn-default pull-left"  onclick="window.location='project.php'">
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

{include file='include/footer_js.tpl'}
</body>
</html>