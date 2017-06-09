{* Purpose : To add candidate.
   Created : Nikitasa
   Date : 17-04-2017 *}
   
{include file='include/top.tpl'}

</head>
<body  class="datatables-page">


<!-- Start: Main -->
<div id="main"> 
  

 <!-- Start: Content -->
  <section id="content_wrapper">
  
    <div id="content">
     
	  <div class="row">
        <div class="col-md-12">
          <div class="panel">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Set Question's Option </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
             	<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Question From
						</th>
						<th class="text-center">
							Question To
						</th>
						<th class="text-center">
							Option Type
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='name0'  placeholder='Question From' class="form-control"/>
						</td>
						<td>
						<input type="text" name='mail0' placeholder='Question To' class="form-control"/>
						</td>
						<td>
						<select name='mobile0' class="form-control">
						<option>Select</option>
						</select>
						
						</td>
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>
				
<div class="form-group">
	          
			   <input type="button" value="Cancel" style="margin-right:20px;" class="btn btn-default pull-left"  onclick="parent.$.colorbox.close()">

	<a id="add_row" style="margin-left:20px;"  class="btn btn-default pull-right">Add Row</a>
	<a id='delete_row' style="margin-right:20px;"  class="pull-left btn btn-default">Delete Row</a>
	             <input  class="submit btn bg-orange2 pull-right" type="submit" value="Submit">
 </div>
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
{literal}
<script>
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Question From' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Question To'  class='form-control input-md'></td><td><select  name='mobile"+i+"' class='form-control input-md'><option>Select</option></select></td>");
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
</script>
{/literal}
</body>
</html>
