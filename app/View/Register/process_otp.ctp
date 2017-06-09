<!-- Start: Main -->
<div id="main">
  <div id="content">
  	<div style="color:#ffffff;margin-bottom:10px;font-weight:bold;"><img title="AssessKey" src="<?php echo $this->webroot;?>img/ak_logo.png"/></div>

    <div class="row">
      <div class="panel-bg">
	 <?php echo $this->Form->create('Register', array( 'id' => 'formID', 'class' => 'cmxform formID')); ?>

        <div class="panel">
		
          <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span> Enter OTP </span>  </div>
          <div class="panel-body">
            <!--div class="login-avatar"> <img src="img/campus_login_pic.jpg" width="150" height="112" alt="avatar"> </div-->
          	<?php echo $this->Session->flash();?>
			<div class="form-group">
                  <label for="name">Please Enter OTP</label>
               	<?php echo $this->Form->input('otp', array('div'=> false,'type' => 'password', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 

                </div>
          </div>
         <div class="panel-footer"> 
       <!--  <span class="text-muted fs12 lh30">
         <a href="forgot_password.php"> Forgotten Password?</a></span> -->
		 
        <button type="submit" class="btn btn-sm bg-purple2 pull-right"><i class="fa fa-home"></i> Submit</button>  
<!--        <a href="attend_test.php" class="btn btn-sm bg-purple2 pull-right"> <i class="fa fa-home">Submit</i> </a> -->
            <div class="clearfix"></div>
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>
</div>

	<div class="overlay-black"></div>
