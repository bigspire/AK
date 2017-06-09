{* Purpose : To edit drive.
   Created : Nikitasa
   Date : 27-04-2017 *}

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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Edit Drive </span> </div>
            <div class="panel-body">
              
              {if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	  {/if}
			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
              <div class="form-group">
               <label for="wage">Company Name <span class="mandate">*</span></label>
                   <select  name="company" class="form-control" id="company">
				   		<option value="">Select</option>
							{html_options options=$companies selected=$company}	
						</select>
				  	<label for="name" class="error">{$companyErr}</label>
				  	 </div>
				  	 <div class="form-group">
               <label for="wage">Project <span class="mandate">*</span></label>
                   <select  name="project" class="form-control" id="project">
				   		<option value="">Select</option>
							{html_options options=$projects selected=$project}	
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
                  <textarea id="drive_venue" name="drive_venue" type="text" class="form-control error" required="">{if $drive_venue}{$drive_venue}{else}{$smarty.post.drive_venue}{/if}</textarea>
				  <label for="name" class="error">{$drive_venueErr}</label>
                </div>
					<div class="form-group">
                  <label for="name">Drive Date <span class="mandate">*</span></label>
                  <input id="from_date" name="from_date" value="{$from_date}" type="text" placeholder="Drive From" class="form-control error datepick" required="">
				  		<label for="name" class="error">{$drive_fromErr}</label>
				  		</div>
				  		<div class="form-group">
				  		<input id="to_date" name="to_date" value="{$to_date}" type="text" placeholder="Drive To"  class="form-control error datepick" required="">
				  		<label for="name" class="error">{$drive_toErr}</label>
				  		</div>
                
                
                <div class="form-group">
                  <label for="name">Drive Type <span class="mandate">*</span></label>
                  <input  name="drive_type" value="1" {if $drive_type && $drive_type == '1'}{'checked'} {/if} type="radio">On Campus
				  		<input  name="drive_type" value="2" {if $drive_type && $drive_type == '2'}{'checked'} {/if} type="radio">Off Campus
				  		<br>
				  		<label for="name" class="error">{$typeErr}</label>
                </div>
                
					<div class="form-group">
                  <label for="name">Drive Location <span class="mandate">*</span></label>
                   <select id="state" class="form-control" name="state">
				   		<option value="">State</option>
				  			{html_options options=$state_id selected=$state}	
				  		</select>
				  		<label for="name" class="error">{$stateErr}</label>
				  		</div>
				  		<div class="form-group">
                  <select id="dist" class="form-control" name="dist"> 
				   	<option value="">Select</option>
				   		{html_options options=$dist_id selected=$dist}				 
				  		</select>
				  <label for="name" class="error">{$districtErr}</label>
                </div>
                
                 <div class="form-group">
                  <label for="name">Drive Members <span class="mandate"></span></label>
                  <textarea id="drive_member" name="drive_member" type="text" class="form-control error" required="">{if $drive_member}{$drive_member}{else}{$smarty.post.drive_member}{/if}</textarea>
				  <label for="name" class="error">{$drive_membersErr}</label>
                </div>
                
               <div class="form-group">
                  <label for="name">Facilities Available in Venue <span class="mandate"></span></label>
                  <textarea id="facility_venue" name="facility_venue" type="text" class="form-control error" required="">{if $facility_venue}{$facility_venue}{else}{$smarty.post.facility_venue}{/if}</textarea>
				  	<label for="name" class="error">{$facility_availableErr}</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Facilities to be organized <span class="mandate"></span></label>
                  <textarea id="facility_arrange" name="facility_arrange" type="text" class="form-control error" required="">{if $facility_arrange}{$facility_arrange}{else}{$smarty.post.facility_arrange}{/if}</textarea>
				  <label for="name" class="error">{$facility_organizedErr}</label>
                </div>
                
				 <div class="form-group">
                  <label> Status </label>
                    <select id="status" name="status" class="form-control">
								{html_options options=$drive_status selected=$status}		
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