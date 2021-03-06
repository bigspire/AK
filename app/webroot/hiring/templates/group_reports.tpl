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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Group Reports </span> </div>
            <div class="panel-body">
              			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
               <div class="form-group">
                  <label for="name">Company Name</label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option selected="">Wipro Technologies</option>
				  <option>Infosys Technologies</option>
				 
				  </select><label for="name" class="error">This field is required.</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Project Name</label>
                   <select  class="form-control">
				   <option>Select</option>
				  <option selected="">First Project</option>
				  <option>Second Project</option>				 
				  </select><label for="name" class="error">This field is required.</label>
                </div>
                
                <div class="form-group">
                  <label for="name">Drive Name</label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option selected="">Chennai Drive</option>
				  <option>Delhi Drive</option>				 
				  </select>
				  <label for="name" class="error">This field is required.</label>
                </div>
                <div class="form-group">
                  <label> From Date </label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label> To Date </label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Keyword</label>
                  <input id="name" name="name" type="text" placeholder="Name/Email/Mobile" class="form-control error" required="">
                </div>
                <div class="form-group">
                <label for="name">Type</label>
                 <input type="radio" name="type" value="personality"> Personality Profiling
  					  <input type="radio" name="type" value="situational"> Situational Response
  					  <input type="radio" name="type" value="both"> Both
				 	 </div>
                <div class="form-group">
	             <div class="pr20  pull-right"><input class="submit btn bg-blue" name="submit" type="submit" value="Submit"></div>
	             
	             {if $download != '1'}
	             {assign var="hide" value="dn"}
	             {/if}
				  	<div class="pr20  pull-left"><input class="submit btn bg-green2" type="download" value="Download Excel"></div>
				  
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


<div class="modal fade" id="alertModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Are you sure you want to delete?</h4>
      </div>
      <div class="modal-body">
        <div class="form-group text-center">
          <button type="button" class="btn btn-success btn-gradient mr5" data-dismiss="modal"><i class="fa fa-check"></i> Yes</button>
          <button type="button" class="btn btn-danger btn-gradient" data-dismiss="modal"><i class="fa fa-warning"></i> No</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
