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
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> 
			Add Test Parameter </span> </div>
            <div class="panel-body">
              
				{if $EXIST_MSG}
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$EXIST_MSG}
              	 </div>
			  	{/if}
		<form action="add_test_parameter.php?id={$smarty.get.id}" method="post">		
             	<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<tbody>
					<tr id='addr0'>
						<td>
						Parameter Name
						</td>
						<td>
						<input type="text" name='parameter' id="" placeholder='' class="form-control"/>
						<label class="error">{$paraErr}</label>
						</td>
						<td>
							<input  class="submit btn bg-orange2 pull-right" type="submit" value="Submit">
						</td>						
					</tr>
				</tbody>
			</table>
			
			<div class="form-group">
	          
	
 </div>
 
 
		</div>
	</div>
				

 
 
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
{if $para_add eq '1'}
{literal}
<script type="text/javascript">
parent.$('.para_drop').append('<option id="">{/literal}{$smarty.post.parameter}{literal}</option>');
parent.$.colorbox.close(); 
</script>
{/literal}
{/if}

</body>
</html>
