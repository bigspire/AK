{* Purpose : To add drive.
   Created : Nikitasa
   Date : 26-04-2017 *}

{include file='include/top.tpl'}

</head>
<body  class="datatables-page">

{include file='include/header.tpl'}

<!-- Start: Main -->
<div id="main"> 
  
{include file='include/left_menu.tpl'}

<!-- Start: Main -->
  <section id="content_wrapper">
  
    <div id="content">
     
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Add Drive </span> </div>
            <div class="panel-body">
              
              {if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	  {/if}
			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
              <div class="form-group">
               <label for="wage">Company Name<span class="mandate">*</span></label>
                   <select  name="company" class="form-control" id="company">
				   		<option value="">Select</option>
							{html_options options=$companies selected=$smarty.post.company}	
						</select>
				  	<label for="name" class="error">{$companyErr}</label>
				  	 </div>
				  	 <div class="form-group">
               <label for="wage">Project <span class="mandate">*</span></label>
                   <select  name="project" class="form-control" id="project">
				   		<option value="">Select</option>
							{html_options options=$projects selected=$smarty.post.project}	
						</select>
				  	<label for="name" class="error">{$projectErr}</label>
				  	 </div>
                <div class="form-group">
                  <label for="name">Drive Name <span class="mandate">*</span></label>
                  <input name="drive_name" value="{$drive_name}" type="text" class="form-control error" required="">
				 		<label for="name" class="error">{$drive_nameErr}</label>
				  </div>

				 <div class="form-group">
                  <label for="name">Drive Venue <span class="mandate">*</span></label>
                  <textarea id="drive_venue" name="drive_venue" type="text" class="form-control error" required="">{$smarty.post.drive_venue}</textarea>
				  <label for="name" class="error">{$drive_venueErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Drive Date <span class="mandate">*</span></label>
                  <input id="drive_from" name="drive_from" value="{$drive_from}" type="text" placeholder="Drive From" class="form-control error datepick" required="">
				  		<label for="name" class="error">{$drive_fromErr}</label>
				  		</div>
				  		<div class="form-group">
				  		<input id="drive_to" name="drive_to" value="{$drive_to}" type="text" placeholder="Drive To"  class="form-control error datepick" required="">
				  		<label for="name" class="error">{$drive_toErr}</label>
				  		</div>
                
                
                <div class="form-group">
                  <label for="name">Drive Type <span class="mandate">*</span></label>
                  <input  name="type" value="1" type="radio">On Campus
				  		<input  name="type" value="2" type="radio">Off Campus
				  		<br>
				  		<label for="name" class="error">{$typeErr}</label>
                </div>
                
					<div class="form-group">
                  <label for="name">Drive Location <span class="mandate">*</span></label>
                   <select id="state" class="form-control" name="state">
				   		<option value="">State</option>
				  			{html_options options=$state_id selected=$smarty.post.state}	
				  		</select>
				  		<label for="name" class="error">{$stateErr}</label>
				  		</div>
				  		<div class="form-group">
                  <select id="dist" class="form-control" name="dist"> 
				   	<option value="">Select</option>
				   		{html_options options=$dist_id selected=$smarty.post.dist}				 
				  		</select>
				  <label for="name" class="error">{$districtErr}</label>
                </div>
                
                 <div class="form-group">
                  <label for="name">Drive Members <span class="mandate"></span></label>
                  <textarea id="drive_members" name="drive_members" type="text" class="form-control error" required="">{$smarty.post.drive_members}</textarea>
				  <label for="name" class="error">{$drive_membersErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Facilities Available in Venue <span class="mandate"></span></label>
                  <textarea id="facility_available" name="facility_available" type="text" class="form-control error" required="">{$smarty.post.facility_available}</textarea>
				  <label for="name" class="error">{$facility_availableErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Facilities to be organized <span class="mandate"></span></label>
                  <textarea id="facility_organized" name="facility_organized" type="text" class="form-control error" required="">{$smarty.post.facility_organized}</textarea>
				  <label for="name" class="error">{$facility_organizedErr}</label>
                </div>
                
				 <div class="form-group">
                  <label> Status </label>
                    <select id="status" name="status" class="form-control">
				   		{if isset($status)}
								{html_options options=$drive_status selected=$status}	
							{else}
								{html_options options=$drive_status selected='1'}	
							{/if}
				 		</select>
                </div>
                <div class="form-group">
				  <input type="button" value="Cancel" class="btn btn-default pull-left"  onclick="window.location='drive.php'">
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