<!-- Start: Main -->
<div id="main">
  <div id="content">
   
	            <div style="color:#ffffff;margin-bottom:10px;font-weight:bold;">AssessKey</div>

    <div class="row">
      <div class="panel-bg">
     	<?php echo $this->Form->create('Admin', array( 'id' => 'formID', 'class' => 'cmxform formID')); ?>
		
        <div class="panel">
          <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span> Login </span> 

<span class="note">All fields are mandatory</span>		  

</div>
          <div class="panel-body">
		  
		  					<?php echo $this->Session->flash();?>

        
               
                <div class="form-group">
                  <label for="wage">Email <span class="mandate">*</span></label>
				<?php echo $this->Form->input('email_id', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
				  <!-- <label for="wage" class="error">This field is required.</label> -->
                </div>
                <div class="form-group">
                  <label> Password <span class="mandate">*</span></label>
				<?php echo $this->Form->input('password', array('div'=> false,'type' => 'password', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
                </div>
				
          </div>
         <div class="panel-footer"> 
       <!--  <span class="text-muted fs12 lh30">
         <a href="forgot_password.php"> Forgotten Password?</a></span> -->
<!--  <a href="otp.php"><button type="button" class="btn btn-sm bg-purple2 pull-right"><i class="fa fa-home"></i> Submit</button> </a>  -->
  <button type="submit" class="btn btn-sm bg-purple2 pull-right"><i class="fa fa-home"></i> Submit</button> 
<!--    <a href="otp.php" class="btn btn-sm bg-purple2 pull-right"> <i class="fa fa-home">Submit</i> </a>-->
            <div class="clearfix"></div>
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!-- End: Main -->

	<div class="overlay-black"></div>

