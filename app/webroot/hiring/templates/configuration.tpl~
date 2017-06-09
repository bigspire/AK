{* Purpose : To change configuration.
   Created : Nikitasa
   Date : 29-04-2017 *}
   
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
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Configuration </span> </div>
            <div class="panel-body">
              
			  	  {if $SUCCESS_MSG}
               <div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {$SUCCESS_MSG}
              	 </div>
			  	  {/if}
			  
              <form action="configuration.php" class="cmxform" id="altForm" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="name">No. of Records per Page</label>
                  <select name="rec_page" id="rec_page" class="form-control">
							<option value="">Select</option>
							{html_options options=$records selected=$rec_page}			 
						</select>
						 <label for="name" class="error">{$no_recordsErr}</label>
                </div>
                <div class="form-group">
                  <label for="name">Theme Color</label>
                  <label class="radio-inline mr10">
                      <input type="radio" name="theme" rel="bg-red2" class="colorHeader" {if $theme && $theme == 'bg-red2'}{'checked'} {/if} id="color" value="bg-red2">
                     Red </label>
					  <label class="radio-inline mr10">
                      <input type="radio" rel="bg-purple2" class="colorHeader" {if $theme && $theme == 'bg-purple2'}{'checked'} {/if} name="theme" id="color" value="bg-purple2">
                     Purple </label>
                     	  <label class="radio-inline mr10">
                      <input type="radio" rel="bg-brown-alt" class="colorHeader"{if $theme && $theme == 'bg-brown-alt'}{'checked'} {/if}  name="theme" id="color" value="bg-brown-alt">
                     Brown</label>
                     	  <label class="radio-inline mr10">
                      <input type="radio" rel="bg-orange2" class="colorHeader" {if $theme && $theme == 'bg-orange2'}{'checked'} {/if} name="theme" id="color" value="bg-orange2">
                     Orange</label>
                     	  <label class="radio-inline mr10">
                      <input type="radio" rel="bg-blue5-alt" class="colorHeader" {if $theme && $theme == 'bg-blue5-alt'}{'checked'} {/if} name="theme" id="color" value="bg-blue5-alt">
                     Blue</label>
                     <br>
						  <label for="name" class="error">{$colorErr}</label>
                </div>		
                <div class="form-group">
						<a href="admin_home.php"><input type="button" value="Cancel" class="btn btn-default pull-left"></a>
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