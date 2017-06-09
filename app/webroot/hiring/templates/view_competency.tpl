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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> View Competency >> STRESS MANAGEMENT </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
      
			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">Competency Name:</label> 
				  <span class="form-control form-data">STRESS MANAGEMENT</span>
                </div>
                <div class="form-group">
                  <label for="wage">Description:</label>
 						<span class="form-control form-data"></span>               
					 </div>
                
				 <div class="form-group">
                  <label> Status: </label>  <span class="form-control form-data">Active</span>
                 
                </div>
                <div class="form-group">
				 <a href="competency.php"><input class="btn btn-default pull-left" type="button" value="Go Back"></a>
				  
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
