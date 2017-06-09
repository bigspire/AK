{* Purpose : To edit candidate.
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Edit Candidate </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
              <form action="" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Company Name <span class="mandate">*</span></label>
                  <select  name="company" class="form-control" id="company">
				   		<option value="">Select</option>
							{html_options options=$companies selected=$company}	
						</select>
				  		<label for="name" class="error">{$companyErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Project Name <span class="mandate">*</span></label>
                   <select  name="project" class="form-control" id="project">
				   		<option value="">Select</option>
				  			{html_options options=$projects selected=$project}			 
						 </select>
				  		 <label for="name" class="error">{$projectErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Drive Name <span class="mandate">*</span></label>
                  <select  name="drive" class="form-control" id="drive">
				   		<option value="">Select</option>
				  			{html_options options=$drives selected=$drive}			 
						</select>
				  		<label for="name" class="error">{$driveErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">First Name <span class="mandate">*</span></label>
                  <input id="first_name" name="first_name" value="{$first_name}" type="text" class="form-control error" required="">
                  <label for="name" class="error">{$first_nameErr}</label>
                </div>
				 <div class="form-group">
                  <label for="name">Last Name <span class="mandate">*</span></label>
                    <input id="last_name" name="last_name" value="{$last_name}" type="text" class="form-control error" required="">
			  <label for="name" class="error">{$last_nameErr}</label>
                </div>
					
					<div class="form-group">
                  <label for="name">Emp Id </label>
                  <input id="email" name="emp_id" value="{if $emp_id}{$emp_id}{else}{$smarty.post.emp_id}{/if}" type="text" class="form-control error" required="">
                </div>
                 
                 <div class="form-group">
                  <label for="name">Department </label>
                  <input name="department" value="{if $department}{$department}{else}{$smarty.post.department}{/if}" type="text" class="form-control error" required="">
                <label for="name" class="error">{$emp_idErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Designation </label>
                  <input name="designation" value="{if $designation}{$designation}{else}{$smarty.post.designation}{/if}" type="text" class="form-control error" required="">
                <label for="name" class="error">{$emp_idErr}</label>
                </div>
                
					<div class="form-group">
                  <label for="name">Email <span class="mandate">*</span></label>
                  <input id="email" name="email" value="{$email}" type="text" class="form-control error" required="">
			  <label for="name" class="error">{$emailErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Mobile <span class="mandate">*</span></label>
                  <input id="mobile" name="mobile" value="{$mobile}" type="text" class="form-control error" required="">
				  <label for="name" class="error">{$mobileErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">State <span class="mandate">*</span></label>
                  <select id="state" class="form-control" name="state">
				   		<option>State</option>
				  			{html_options options=$state_id selected=$state}	
				  		</select>
				 		<label for="name" class="error">{$stateErr}</label>
					</div>
               
                <div class="form-group">
                  <label for="name">District <span class="mandate">*</span></label>                 
				   	<select id="dist" class="form-control" name="dist"> 
				   		{html_options options=$dist_id selected=$dist}				 
				  		</select>
				   	<label for="name" class="error">{$districtErr}</label>
                </div>
				
				 <div class="form-group">
                  <label>Status <span class="mandate">*</span></label>
                  <select id="status" name="status" class="form-control">
							{html_options options=$candidate_status selected=$status}	
				 		</select>
				 		 <label for="name" class="error">{$statusErr}</label>
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
