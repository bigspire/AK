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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Online Test </span> </div>
            <div class="panel-body">
              <div class="table-responsive">
              
						
			<div class="panel-menu dt-panelmenu"><div class="dataTables_length" id="datatable_length">
			<label>Show <select name="datatable_length" aria-controls="datatable" class="">
			<option value="5">5</option><option value="10">10</option><option value="25">25</option>
			<option value="50">50</option><option value="-1">All</option></select> Rows</label>
			</div><div id="datatable_filter" class="dataTables_filter">
			
			<form action="drive.php" method="post">
			<label>
			
			<input type="text" aria-controls="datatable" placeholder="Enter Filter Terms Here....">
			<input type="text" style="width:100px;"  aria-controls="datatable" placeholder="From Date">
			<input type="text" style="width:100px;"  class="" aria-controls="datatable" placeholder="To Date">
			<input class="submit btn  btn-xs bg-orange2" style="color:#fff;width:auto;" type="submit" value="Go">
			
			</label>
			</form>
			</div></div>

			
					<table class="table table-striped table-bordered table-hover" id="datatable">	
                  <thead>
                    <tr>
					<th class="sorting" tabindex="0" 	title="Test Name: activate to sort column ascending" style="width: 250px;">Test Name</th>                     
                   <th class="sorting" tabindex="0" 	title="No. of Questions: activate to sort column ascending" style="width: 250px;">No. of Questions</th>                     
					<th class="sorting" tabindex="0" 	title="Test Type: activate to sort column ascending" style="width: 250px;">Test type</th>
					<th class="sorting" tabindex="0" 	title="Company Name: activate to sort column ascending" style="width: 250px;">Company Name</th>

					<th class="sorting" tabindex="0" 	title="Status: activate to sort column ascending" style="width: 150px;">Status</th>
					<th class="sorting_desc" tabindex="0" 	title="Created: activate to sort column ascending" style="width: 150px;">Created</th>
					<th width="50">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
					 <td><a href="view_ot.php">First Test</a></td>
						<td>25</td>
					  <td>Aptitude Test</td>
                      <td>Wipro</td>
                      <td><span class="label bg-green mr5">Active</span></td>
                      <td>21-Nov-2016</td>
                      <td class="hidden-xs text-center"><div class="btn-group">
                     
                        <button type="button" class="btn bg-green2 btn-gradient btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-cogwheel"></span> </button>
                        <ul class="dropdown-menu checkbox-persist pull-right text-left" role="menu">
                          <li><a href="#"><i class="fa fa-pencil"></i> Edit </a></li>
                          <li><a href="#" data-toggle="modal" data-target="#alertModal"><i class="fa fa-trash-o"></i> Delete </a></li>
						  						  <li><a href="add_qn.php"><i class="fa fa-plus"></i> Add Questions </a></li>

                        </ul>
                      </div>
					  </td>
                    </tr>
			
				
				</tbody>
                </table>
				<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 8 of 10 entries</div>
<div class="dataTables_paginate paging_bs_normal" id="datatable_paginate">

<ul class="pagination pagination-sm">
<li class="prev disabled"><a href="#"><i class="fa fa-caret-left"></i> &nbsp;</a></li><li class="active">
<a href="#">1</a></li><li><a href="#">2</a></li><li class="next"><a href="#">&nbsp;<i class="fa fa-caret-right"></i> </a></li>
</ul></div>

<!--ul id="paginator-example" class="pagination"><li><a title="Go to previous page">&lt;</a></li>
<li><a title="Go to page 1">1</a></li><li><a title="Go to page 2">2</a></li>
<li class="active"><a title="Current page is 3">3</a></li>
<li><a title="Go to page 4">4</a></li>
<li><a title="Go to page 5">5</a></li>
<li><a title="Go to next page">&gt;</a></li>
</ul-->
				
				
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
