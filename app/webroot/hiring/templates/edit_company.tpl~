{* Purpose : To edit company.
   Created : Nikitasa
   Date : 24-04-2017 *}
   
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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Edit Company </span> </div>
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
                  <input name="company_name" value="{$company_name}" type="text" class="form-control error" required="">
				  		<label for="name" class="error">{$companyErr}</label>
                </div>                           
                
					<div class="form-group">
                  <label for="name">Email <span class="mandate">*</span></label>
                  <input id="email" name="email" value="{$email}" type="text" class="form-control error" required="">
			  <label for="name" class="error">{$emailErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Phone <span class="mandate">*</span></label>
                  <input id="phone" name="phone" value="{$phone}" type="text" class="form-control error" required="">
				  <label for="name" class="error">{$phoneErr}</label>
                </div>
                 <div class="form-group">
                  <label> Address <span class="mandate">*</span></label>
                  <textarea id="address" name="address" class="form-control">{$address}</textarea>
                  <label for="name" class="error">{$addressErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Website </label>
                  <input id="website" name="website" value="{if $website}{$website}{else}{$smarty.post.website}{/if}" type="text" class="form-control error" required="">
               	<label for="name" class="error">{$websiteErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Company Profile </label>
                  <textarea id="company_profile" name="company_profile" class="form-control">{if $company_profile}{$company_profile}{else}{$smarty.post.company_profile}{/if}</textarea>
               	<label for="name" class="error">{$company_profileErr}</label>
                </div>
                
					<div class="form-group">
                  <label for="name">State <span class="mandate">*</span></label>
                  <select id="state" class="form-control" name="state">
				   		<option value="">State</option>
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
                  <label for="name">PO Number </label>
                  <input id="po_no" name="po_no" value="{if $po_no}{$po_no}{else}{$smarty.post.po_no}{/if}" type="text" class="form-control error" required="">
                </div>
                 <div class="form-group">
                  <label for="name">Contract Validity  <span class="mandate">*</span></label>
                  <input name="validity_date" value="{$validity_date}" type="text" class="datepick form-control error" required="">
                	 <label for="name" class="error">{$validityErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Scope of Work <span class="mandate">*</span></label>
                  <textarea id="scope_work" name="scope_work" class="form-control">{$scope_work}</textarea>
                	<label for="name" class="error">{$scope_workErr}</label>
                </div>
				 <div class="form-group">
                  <label>Status <span class="mandate">*</span></label>
                  <select id="status" name="status" class="form-control">
								{html_options options=$company_status selected=$status}	
				 		</select>
              </div>
				
				
                <div class="form-group">
				 <a href="company.php" class="jsRedirect"><input class="btn btn-default pull-left"  type="button" value="Cancel"></a>
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