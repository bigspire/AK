{* Purpose : To import candidate.
   Created : Nikitasa
   Date : 09-05-2017 *}
   
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Import Candidate </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
              <form action="import_candidate.php" enctype="multipart/form-data" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Company Name <span class="mandate">*</span></label>
                  <select  name="company" class="form-control" id="company">
				   		<option value="">Select</option>
							{html_options options=$companies selected=$smarty.post.company}	
						</select>
				  		<label for="name" class="error">{$companyErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Project Name <span class="mandate">*</span></label>
                   <select  name="project" class="form-control" id="project">
				   		<option value="">Select</option>
				  			{html_options options=$projects selected=$smarty.post.project}			 
						 </select>
				  		 <label for="name" class="error">{$projectErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Drive Name <span class="mandate">*</span></label>
                  <select  name="drive" class="form-control" id="drive">
				   		<option value="">Select</option>
				  			{html_options options=$drives selected=$smarty.post.drive}			 
						</select>
				  		<label for="name" class="error">{$driveErr}</label>
                </div>
                
             <div class="form-group">
                  <label for="name">Attach Excel </label>
                  <input name="attachment" type="file" class="form-control error" required="">
                <label for="name" class="error">{$attachErr}{$attachmentuploadErr}</label>
                </div>

                <div class="form-group">
				 <a href="candidate.php" class="jsRedirect"><input class="btn btn-default pull-left"  type="button" value="Cancel"></a>
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