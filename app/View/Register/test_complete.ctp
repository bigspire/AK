<!-- Start: Main -->
<div id="main">
  <div id="content">
      	<div style="color:#ffffff;margin-bottom:10px;font-weight:bold;"><img title="AssessKey" src="<?php echo $this->webroot;?>img/ak_logo.png"/></div>

    <div class="row">
      <div class="panel-bg">
      <form name="" class="cmxform"  action='login.php' id="altForm" method="post" novalidate="novalidate">
        <div class="panel">
          <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span>

		   <?php if($this->request->named['action'] == 'donebefore'):?>
		   Oops!
		  <?php else: ?>
		   THANK YOU!
		  <?php endif; ?>
		  
		 
		  
		  
		  </span>  </div>
          <div class="panel-body">
		  
		  <?php
		   if($this->request->named['action'] == 'donebefore'):?>
		   You have already completed the test. We will get back to you at the earliest.
		  <?php else: ?>
		   You have successfully completed both the tests. We will get back to you at the earliest.
		  <?php endif; ?>
           
		  

          </div>
         <div class="panel-footer"> 
		 © AssessKey. All rights reserved 
            <div class="clearfix"></div>
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>
</div>