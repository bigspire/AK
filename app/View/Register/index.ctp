<!-- Start: Main -->
<div id="main">
  <div id="content">
    <!--div class="row">
      <div id="page-logo"> <img src="<?php echo $this->webroot;?>img/campus_login.png" class="img-responsive" alt="logo"> </div>
    </div-->
	            <div style="color:#ffffff;margin-bottom:10px;font-weight:bold;"><img title="AssessKey" src="<?php echo $this->webroot;?>img/ak_logo.png"/></div>

    <div class="row">
      <div class="panel-bg">
     	<?php echo $this->Form->create('Register', array( 'id' => 'formID', 'class' => 'cmxform formID')); ?>
		
        <div class="panel">
          <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span> Registration </span> 

<span class="note">All fields are mandatory</span>		  

</div>
          <div class="panel-body">
		  
		  					<?php echo $this->Session->flash();?>

            <div class="form-group">
			
                  <label for="name">First Name <span class="mandate">*</span></label>
               	
				<?php echo $this->Form->input('first_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 

                </div>
                <div class="form-group">
                  <label for="name">Last Name <span class="mandate">*</span></label>
				<?php echo $this->Form->input('last_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
				 <!-- <label for="name" class="error">This field is required.</label> -->
                </div>
				<div class="form-group">
                  <label> Emp. ID </label>
				<?php echo $this->Form->input('emp_code', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
                </div>
                <div class="form-group">
                  <label for="wage">Email <span class="mandate">*</span></label>
				<?php echo $this->Form->input('email_id', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'form-control',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
				  <!-- <label for="wage" class="error">This field is required.</label> -->
                </div>
                <div class="form-group">
                  <label> Mobile <span class="mandate">*</span></label>
				<?php echo $this->Form->input('mobile', array('div'=> false,'type' => 'text',
				'label' => false, 'class' => 'form-control', 'maxlength' => '10', 'required' => false, 
				'placeholder' => '', 
				'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 
                </div>
				 <div class="form-group">
                  <label>Language for Online Test <span class="mandate">*</span></label>
			<?php echo $this->Form->input('language_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'form-control', 
			'empty' => 'Select',   'required' => false, 'placeholder' => '', 
			'options' => $language_list, 'error' => 
			array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 

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

