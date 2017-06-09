<!-- Start: Header navbar-fixed-top -->
<header class="navbar navbar-white-text bg-blue5-alt">
  <div class="navbar-branding"> <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span> 
  <a class="navbar-brand" href="#" style="color:#ffffff;font-weight:bold;font-size:15px;">AssessKey</a> </div>
 
 
</header>
 
<!-- Start: Main -->
<div id="main" > 
  
  
 <!-- Start: Sidebar -->
  <aside id="sidebar_left" class="leftDiv">
    <div class="user-info">
      <div class="media">
        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
        <div class="media-body">
          <h5 class="media-heading mt5 mbn fw700 cursor">HI, <?php echo ucfirst($this->Session->read('USER.Register.first_name'));?></h5>
          <!--div class="media-links fs11">
		  <i class="fa fa-circle text-muted fs3 p8 va-m">
		  </i><a href="<?php echo $this->webroot;?>register/logout/">Sign Out</a>
		  </div-->
        </div>
      </div>
    </div>
    <div class="user-divider"></div>
	<div class="sidebar-menu">
      <ul class="nav">
       	
          
		  
             	 </ul>
	 
	 <div id="content">
	 <div id="widget-dropdown" class="row">
      
        <div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-bar-chart-o text-teal"></i></div>
              <h2 class="mt15 lh15 text-teal2"><b>108</b></h2>
              <h5 class="text-muted">Questions</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-comments-o text-blue"></i></div>
              <h2 class="mt15 lh15 text-blue2" id="clicked"><b><?php echo $total_answered;?></b></h2>
              <h5 class="text-muted">Answered</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-twitter text-purple"></i></div>
              <h2 class="mt15 lh15 text-purple2"><div id="countdowntimer"><span id="hs_timer"></span></div></h2>
              <h5 class="text-muted">Remaining!</h5>
				<div colspan="4"><span id="hs_timer"></span></div>
                            
            </div>
          </div>
        </div>
      </div>
	  </div>
    </div>
  </aside>
    
  <!-- Start: Content -->
  <section id="content_wrapper">
  
    <div id="content">
      
      <?php echo $this->Session->flash();?>
	  
      <div class="row">
        <div class="col-md-12">
		
		<div class="panel insone dn insData" id="alertT2M" style="background:#fcfcfc;">
		  
            <div class="panel-heading"> <span class="panel-title">
			<span class="glyphicon glyphicon-list-alt"></span> <b style="font-size:16px;">TEST 1: INSTRUCTIONS</span></b> </div>
           

		   
<?php if($this->Session->read('USER.Register.language_id') == '1'):?>
		   
		   
		   <div class="panel-body">
		
      

<div class="" style="color:;font-size:15px;">
	  
<div style="margin-bottom:10px;">Dear <b><?php echo ucfirst($this->Session->read('USER.Register.first_name'));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">
This is a simple test designed to helps us understand you better. We look forward to your <b>honest / spontaneous response </b><br>to the statements listed below. 

Your responses will be kept confidential and will be used only for the official purpose.


 <br><br>
Kindly follow the below-given guidelines: <br>
<ol style="margin-top:10px;">
<li>There are totally 108 Questions.</li>
<li>There is no right (or) wrong response.</li>
<li>Respond to all statements without fail.</li>
<li>Share your ‘top of the mind’ response.</li>
<li>Choose ONLY one of the following options for each statement that exactly (or) closely reflects about yourself.
<ul class="optionList" style="margin-top:5px;">
<li>Strongly Agree </li>	<li>Agree 	</li>	<li>Neither Agree Nor Disagree</li>
<li>Disagree		</li><li>Strongly Disagree</li>
</ul>
</li>
</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:35px;">The time allotted for this test is 45 mins.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT2 btn btn-success btn-gradient mr5"><i class="fa fa-remove"></i> Proceed</button>
        </div>
      </div>
   

		 </div>
	  <?php elseif($this->Session->read('USER.Register.language_id') == '2'):?>
	  
	     <div class="panel-body">
		
      

<div class="" style="color:;font-size:15px;line-height:26px;">
	  
<div style="margin-bottom:10px;">அன்பான  <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">

இது உங்களைப் புரிந்து கொள்ள வடிவமைக்கப்பட்ட ஒரு எளிய சோதனையாகும். 
கீழே உள்ள வாக்கியங்களுக்கு நீங்கள் நேர்மையான / இயல்பான பதில்களைத் தருமாறு 
நாங்கள் உங்களை எதிர்பார்க்கிறோம். உங்கள் பதில்கள் ரகசியமாக வைக்கப்பட்டு அலுவல் 
நோக்கத்திற்கு மட்டுமே பயன்படுத்தப்படும்

<br><br>
தயவுசெய்து கீழே தரப்பட்டுள்ள வழிகாட்டுதல்களை பின்பற்றவும்: <br>
<ol style="margin-top:10px;">
<li>மொத்தமாக 108 கேள்விகள் உள்ளன.</li>
<li>எல்லா வாக்கியங்களுக்கும் தவறாமல் பதில் தரவும். </li>
<li>சரியான (அல்லது) தவறான பதில் என்பது இல்லை.</li>
<li>உங்கள் ‘மனதில் முதலில் வரும்’ பதிலைப் பகிருந்து கொள்ளவும்.</li>
<li>கீழே வருவனவற்றில் உங்களை சரியாக (அல்லது) மிக நெருக்கமாகப் பிரதிபலிக்கும் ஏதேனும் ஒன்றை தேர்ந்தெடுக்கவும். 
<ul class="optionList" style="margin-top:5px;">
<li>உறுதியாக ஏற்றுக்கொள்கிறேன் </li>	<li>ஏற்றுக்கொள்கிறேன்   	</li>	<li>ஏற்றுக்கொள்ளவோ மறுக்கவோ இல்லை </li>
<li>மறுக்கிறேன்		</li><li>உறுதியாக மறுக்கிறேன்</li>
</ul>
</li>
</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:35px;">இதற்கு ஒதுக்கப்பட்டுள்ள நேரம் 45 நிமிடங்களாகும்.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT2 btn btn-success btn-gradient mr5"><i class="fa fa-remove"></i> Proceed</button>
        </div>
      </div>
   

		 </div>
	
	<?php elseif($this->Session->read('USER.Register.language_id') == '3'):?>
	  
	    <div class="panel-body">
		
      

<div class="" style="color:;font-size:15px;">
	  
<div style="margin-bottom:10px;">ಆತ್ಮೀಯ   <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">

ನಿಮ್ಮನ್ನು ಚೆನ್ನಾಗಿ ಅರ್ಥಮಾಡಿಕೊಳ್ಳಲು ಸಹಾಯವಾಗಲೆಂದು ಈ ಸರಳ ಪರೀಕ್ಷೆಯನ್ನು ವಿನ್ಯಾಸಗೊಳಿಸಲಾಗಿದೆ. ನಾವು ಕೆಳಗೆ ಪಟ್ಟಿಯಲ್ಲಿರುವ ಹೇಳಿಕೆಗಳಿಗೆ ನಿಮ್ಮ ಪ್ರಾಮಾಣಿಕ/ಸರಳ ಪ್ತತಿಕ್ರಿಯೆಯನ್ನು ಎದುರು ನೋಡುತ್ತಿದ್ದೇವೆ. ನಿಮ್ಮ ಪ್ರತಿಕ್ತಿಯೆಯನ್ನು ಗೌಪ್ಯವಾಗಿ ಇಡಲಾಗುತ್ತದೆ ಮತ್ತು ಅಧಿಕೃತ ಉದ್ದೇಶಕ್ಕಾಗಿ ಮಾತ್ರ ಬಳಸಲಾಗುತ್ತದೆ. 

<br><br>
ಕೆಳಗೆ ನೀಡಿರುವ ಸೂಚನೆಗಳನ್ನು ದಯವಿಟ್ಟು ಪಾಲಿಸಿ<br>
<ol style="margin-top:10px;">
<li>ಒಟ್ಟು 108 ಪ್ರಶ್ನೆಗಳು ಇವೆ.</li>
<li>ಎಲ್ಲಾ ಹೇಳಿಕೆಗಳಿಗೆ ತಪ್ಪದೆ ಪ್ರತಿಕ್ರಿಯಿಸಿ</li>
<li>ಯಾವುದಕ್ಕೂ ಸರಿ (ಅಥವಾ) ತಪ್ಪು ಎಂದು ಪ್ರತಿಕ್ರಿಯಿಸಬೇಡಿ</li>
<li>ನಿಮ್ಮ ಮನಸ್ಸಿನ ‘ಉನ್ನತ ಪ್ರತಿಕ್ರಿಯೆಯನ್ನು’ ಹಂಚಿಕೊಳ್ಳಿ </li>
<li>ನಿಮ್ಮ ಬಗ್ಗೆ ನಿಖರವಾಗಿ (ಅಥವಾ) ನಿಕಟವಾಗಿ ಪ್ರತಿಬಿಂಬಿಸಲು ಪ್ರತಿ ಹೇಳಿಕೆಗಳಿಗೆ ಕೆಳಗೆ ನೀಡಿರುವ ಯಾವುದಾದರೂ ಒಂದು ಆಯ್ಕೆಯನ್ನು ಆರಿಸಿಕೊಳ್ಳಿ. 
<ul class="optionList" style="margin-top:5px;">
<li>ಬಲವಾಗಿ ಒಪ್ಪುತ್ತೇನೆ </li>	<li>ಒಪ್ಪುತ್ತೇನೆ  	</li>	<li>ಒಪ್ಪು ಅಥವಾ ಒಪ್ಪುವುದಿಲ್ಲ ಈ ಎರಡೂ ಇಲ್ಲ</li>
<li>ಒಪ್ಪುವುದಿಲ್ಲ			</li><li>ಬಲವಾಗಿ ಒಪ್ಪುವುದಿಲ್ಲ</li>
</ul>
</li>
</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:35px;">ಈ ಪರೀಕ್ಷೆಗೆ ನೀಡಿರುವ ಸಮಯ 45 ನಿಮಿಷಗಳು.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT2 btn btn-success btn-gradient mr5"><i class="fa fa-remove"></i> Close</button>
        </div>
      </div>
   

		 </div>
	  <?php endif; ?>
	  
		 
		 </div>
		 
                  <div class="panel" style="background:#fcfcfc;">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span><b style="font-size:16px;">TEST 1: QUESTIONS</b></span> </div>
            <div class="panel-body">
					<!--<div class="questionDesc persist-header stickyTable">  
						<p class="panel-heading" align="right"> 
						<strong>Time:</strong> <span id="remain">01 Hrs </span>;
				   	<strong>No. of Questions:</strong> 20; <span class="remain">
				   	<strong>No. of Answered:</strong> <span id="answered" class="answered_options">0</span> ; <span class="remain">
				   	<strong>Remaining:</strong> <span id="remain" class="remaining_time">0:59:59</span> Sec</span></span>
				   	</p>
					</div>-->
              <!-- div class="alert alert-theme">Please check the following errors! </div-->
			  <?php echo $this->Form->create('Test', array( 'id' => 'testForm1', 'class' => 'cmxform formID testForm1')); ?>

              <span id="logical">
              <ol type="1" style="list-style-type:none;">
              	 <?php $page = $this->request->params['named']['page'] ? $this->request->params['named']['page']  : '1';
				 $serial = ($page - 1)* $limit;?> 
             <?php $j = 1; foreach($test_data as $test):?>
             	 <div class="form-group" style="border-bottom:1px solid #efefef;">
					<li style="margin:25px 0px;">
						
							
						<div style="width:30px;float:left;"><span style="font-size:18px;font-weight:bold;"><?php echo ++$serial;?>.</div>
						<?php  $margin = $serial > 99 ? 'margin-left:10px' : '';
							$radio_margin = $serial > 99 ? '40px' : '30px'; ?>
						<div style="float:left;font-size:15px;width:80%;font-weight:bold;<?php echo $margin;?>"><?php echo trim($test['Test']['question']);?></div>
						
							<?php $score = explode(',', $test[0]['score']);
								$options = explode('|', $test[0]['options']);
								$op_id = explode(',', $test[0]['options_id']);?>						
						<div class="options validate" style="clear:left;margin-top:15px;">
						<?php $i = 0; 
						// get the correct answer
						foreach($option_result as $res):
							if($res['TestResult']['personal_questions_id'] == $test['Test']['id']):
								$correct = $res['TestResult']['personal_options_id'];
							endif;
						endforeach;
						
						foreach($options as $op):?>
							<?php if($correct == $op_id[$i]):
							$check = 'checked';
							else:
							$check = '';
							endif; ?>
							<label style="margin-left:<?php echo $radio_margin;?>;margin-top:15px;width:250px;" class="radio-inline mr10"><input rel="<?php echo $j;?>" <?php echo $check;?> class="opTest1 op_<?php echo $j;?>"  name="op_<?php echo $j;?>" id="op_<?php echo $test['Test']['id'];?>_<?php echo $op_id[$i];?>_<?php echo $op_id[$i];?>" value="<?php echo $test['Test']['id'].'-'.$op_id[$i];?>" type="radio"> <?php echo $op;?></label>
						<?php 	$i++; endforeach; ?>
						</div>
					<label style="margin-left:25px;margin-top:25px; "class="dn error opEr_<?php echo $j;?>">Please respond to this statement</label>
					 </li>
             	 </div>
				
				<?php $j++; endforeach; ?>
				
				<input type="hidden" value="<?php echo --$j;?>" id="totQn">
			</ol>
				 	
                <div class="form-group"  style="float:left;margin-left:30px;">
               <?php echo $this->element('paging');?>
				  <input type="hidden" id="total_hr" value="<?php echo $remain_time;?>">
				   <input type="hidden" id="total_sec" value="<?php echo $remain_sec;?>">
				     <input type="hidden" id="valid_pass" value="0">
				   <input type="hidden" id="test1" value="<?php echo $total_answered;?>">
<?php echo $this->Form->input('alertT1', array('value' => $this->Session->read('USER.Register.ins_read_t1'), 'id' => 'alertT1', 'type' => 'hidden'));?>
  <input type="hidden" id="test_direct" value="<?php echo $this->webroot;?>test/index/ins:read">
    <input type="hidden" id="test_direct2" value="<?php echo $this->webroot;?>test/index/ins2:read">

  <?php echo $this->Form->input('alertT2', array('value' => $this->Session->read('USER.Register.ins_read_t2'), 'id' => 'alertT2', 'type' => 'hidden'));?>

  
   <input type="hidden" id="test_time" value="<?php echo $this->webroot;?>test/timeout/">
   <input type="hidden" id="cur_page" value="<?php echo $this->request->params['named']['page'] ? $this->request->params['named']['page'] : 1 ;?>"/>
   
				   <?php echo $this->Form->input('test_complete', array( 'id' => 'test_complete', 'type' => 'hidden'));?>
                </div>
			 <?php  if($this->request->params['named']['page'] == $this->Paginator->counter('{:pages}')):?>
				    <a href="#" data-toggle="modal" data-target="#alertModal" style="">
					<button type="submit"  data-toggle="tooltip" title="Complete TEST 1 and Proceed to TEST 2" class="btn btn-sm bg-green2 pull-right" style="margin-right:100px;">
					<i class="fa fa-home"></i> Complete</button></a> 

				  
				  <?php endif; ?>

              </form>
           
			
			</div>
          </div>
                

        </div>
       
	  </div>
	  
    </div>
  
  </section>
  
 
  
  </div>
<!-- End #Main --> 



<div class="modal fade" id="alertModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Are you sure you want to Submit?</h4>
      </div>
      <div class="modal-body">
        <div class="form-group text-center">
          <button type="button" class="confirmBox btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Yes</button>
          <button type="button" class="btn btn-danger btn-gradient" data-dismiss="modal"><i class="fa fa-warning"></i> No</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertT1Modal" data-backdrop="static"  data-keyboard="false" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-md" style="width:50%;font-size:14px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-left">Dear <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b></h4>
      </div>
      <div class="modal-body" style="color:#000000;">
	  
<?php if($this->Session->read('USER.Register.language_id') == '1'):?>
		   
<div style="margin-bottom:10px;text-align:justify;width:90%">
Welcome to AssessKey!
 <br> <br>
You are here to attend two tests. Instructions for attending each test will be displayed in detail before the questions appear.  Read the instructions carefully and attend the tests.
 <br> <br>
You need to spare your undivided attention for 1 Hour 45 Minutes to complete these two tests.
 <br> <br>

If you need any assistance, please feel free contact the local test administrator.
 <br> <br>
Good luck!



</div>

<?php elseif($this->Session->read('USER.Register.language_id') == '2'):?>
	<div style="margin-bottom:10px;text-align:justify;width:90%;line-height:26px;">
அஸ்ஸெஸ்கிக்கு உங்களை வரவேற்கிறோம்!
 <br> <br>
நீங்கள் இங்கே இரண்டு தேர்வுகளில் கலந்து கொள்ளப் போகிறீர்கள். கேள்விகள் தெரியும் முன்பாக ஒவ்வொரு தேர்விலும் கடைப்பிடிக்க வேண்டிய விதிமுறைகள் திரையில் காட்டப்படும். விதிமுறைகளைத் தெளிவாகப் படித்து தேர்வுகளை எழுதவும்.  <br> <br>
இந்த இரு தேர்வுகளையும் நீங்கள் 1 மணி 45 நிமிட நேரம் உங்கள் முழுக்கவனத்தோடு எழுத வேண்டும்.  <br> <br>

உங்களுக்கு ஏதேனும் உதவி தேவையெனில் இங்கிருக்கும் தேர்வு நிர்வாகியை தயக்கமின்றி தொடர்பு கொள்ளவும்.  <br> <br>


நல்லதிர்ஷ்டம் உண்டாகுக!


</div>
	
		
	<?php elseif($this->Session->read('USER.Register.language_id') == '3'):?>
	
	
	<div style="margin-bottom:10px;text-align:justify;width:90%">
ಕೀ ಮೌಲ್ಯಮಾಪನಕ್ಕೆ ಸ್ವಾಗತ!
 <br> <br>
ಇಲ್ಲಿ ನೀವು ಎರಡು ಪರೀಕ್ಷೆಗಳಿಗೆ ಹಾಜರಾಗಲು ಇದ್ದೀರಿ. ಪ್ರಶ್ನೆ ಕಾಣಿಸಿಕೊಳ್ಳುವುದಕ್ಕಿಂತ ಮೊದಲು ಪ್ರತಿಯೊಂದು ಪರೀಕ್ಷೆಗೆ ಹಾಜರಾಗಲು ಸೂಚನೆಗಳನ್ನು ವಿವರವಾಗಿ ತೋರಿಸಲಾಗುವುದು. ಎಚ್ಚರಿಕೆಯಿಂದ ಸೂಚನೆಗಳನ್ನು ಓದಿ ಮತ್ತು ಪರೀಕ್ಷೆಗಳಿಗೆ ಹಾಜರಾಗಿ. <br> <br>


ನೀವು ಈ ಎರಡು ಪರೀಕ್ಷೆಗಳನ್ನು ಪೂರ್ಣಗೊಳಿಸಲು 1 ಗಂಟೆ 45 ನಿಮಿಷಗಳು ವಿಭಜಿಸದ ನಿಮ್ಮ ಗಮನವನ್ನು ನೀಡುವ ಅಗತ್ಯವಿದೆ. <br> <br>

ನಿಮಗೆ ಯಾವುದೇ ಸಹಾಯ ಅಗತ್ಯವಿದ್ದರೆ, ದಯವಿಟ್ಟು ಸ್ಥಳೀಯ ಪರೀಕ್ಷಾ ನಿರ್ವಾಹಕರನ್ನು ಸಂಪರ್ಕಿಸಬಹುದು. <br> <br>
ಶುಭವಾಗಲಿ! 



</div>

	<?php endif; ?>
			
		


        <div class="form-group text-center">
          <button type="button" class="confirmReadT1 btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
