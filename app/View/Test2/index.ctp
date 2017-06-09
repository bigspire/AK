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
		  <i class="fa fa-circle text-muted fs3 p8 va-m"></i>
		  <a href="<?php echo $this->webroot;?>register/logout/">Sign Out</a>
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
              <h2 class="mt15 lh15 text-teal2"><b>27</b></h2>
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
		
		<div class="panel instwo dn insData" id="alertT3M" style="background:#fcfcfc;">
		  
            <div class="panel-heading"> <span class="panel-title">
			<span class="glyphicon glyphicon-list-alt"></span> <b style="font-size:16px;">TEST 2: INSTRUCTIONS</b></span> </div>
           
<?php if($this->Session->read('USER.Register.language_id') == '1'):?>
		   <div class="panel-body">
		
      
      <div class="" style="color:;font-size:15px;">
	  
<div style="margin-bottom:10px;">Dear <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">
This is a simple test designed to helps us understand you better. We look forward to your <b>honest / spontaneous response </b><br>
to the questions listed under each situation. Your responses will be kept confidential and will be used only for the official purpose.
 <br><br>
Kindly follow the below-given guidelines: <br>
<ol style="margin-top:10px;">
<li>There are totally 4 Situations and 27 Questions. </li>
<li>Respond to all the questions without fail.</li>
<li>Share your ‘top of the mind’ response</li>
<li style="line-height:33px;">All the responses must be submitted in RANKING format only <br>
i.e. the best option according to you will get RANK 1 (write as 1) the least option will get RANK 5 (write as 5). 
<br>This way you are expected to Rank from 1 to 5 on all the given statements under each question for all the questions.
<br>
RANK the way <b>you would normally respond to situations like this.</b> 
</li>
<li>DO NOT assign the same RANK to more than one statement in a question.</li>
<li>Read each situation thoroughly and relate the questions to the situation given-above before responding to any question.</li>

</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:30px;">The time allotted for this test is 60 mins.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT3 btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Proceed</button>
        </div>
      </div>
   
		 </div>
		 
	 <?php elseif($this->Session->read('USER.Register.language_id') == '2'):?>
         
		<div class="panel-body">
		
      
      <div class="" style="color:;font-size:15px;">
	  
<div style="margin-bottom:10px;">அன்பான  <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">
இது உங்களைப் புரிந்து கொள்ள வடிவமைக்கப்பட்ட ஒரு எளிய சோதனையாகும்.
கீழே உள்ள வாக்கியங்களுக்கு நீங்கள் நேர்மையான / இயல்பான பதில்களைத் தருமாறு நாங்கள் உங்களை எதிர்பார்க்கிறோம்.
உங்கள் பதில்கள் ரகசியமாக வைக்கப்பட்டு அலுவல் நோக்கத்திற்கு மட்டுமே பயன்படுத்தப்படும். 
 <br><br>
தயவுசெய்து கீழே தரப்பட்டுள்ள வழிகாட்டுதல்களை பின்பற்றவும்: <br>
<ol style="margin-top:10px;">
<li>இங்கே மொத்தம் 4 சூழ்நிலைகளும் 27 கேள்விகளும் தரப்பட்டுள்ளன. அனைத்துக் கேள்விகளுக்கும் தவறாமல் பதிலளிக்கவும்.  </li>
<li>உங்கள் ‘மனதில் முதலில் வரும்’ பதிலைப் பகிருந்து கொள்ளவும்.</li>
<li  style="line-height:33px;">எல்லா பதில்களும் ரேங்கிங் படிவத்திலேயே எழுதப்பட வேண்டும்.
அதாவது உங்கள் முதல் தேர்வுக்கு ரேங்க் 1 (எனவே ரேங்க் 1 என எழுதவும்). 
உங்கள் கடைசித் தேர்வுக்கு ரேங்க் 5 (எனவே ரேங்க் 5 என எழுதவும்).
<br>இதேபோல் கேட்கப்பட்டுள்ள அனைத்துக் கேள்விகளுக்கும் அவற்றின் கீழ் நீங்கள் ரேங்க் 1 முதல் 5  வரை இட வேண்டும். 
<br>
ஒவ்வொரு கேள்விக்கும் உங்கள் மனதில் பட்ட வழிமுறையில் பொருத்தமான ரேங்க் இடவும்.
</li>
<li>ஒரு கேள்வியில் ஒரே ரேங்கை ஒரு தெரிவுக்கு மேல் பல தெரிவுகளுக்கு இட வேண்டாம். </li>
<li>ஒவ்வோரு கேள்வியையும் முழுமையாகப் படித்து சூழ்நிலைக்குப் பொருத்தமான பதிலைத் தரவும்.</li>

</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:30px;">இந்த சோதனைக்கு ஒதுக்கப்பட்ட நேரம் 60 நிமிடங்கள்.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT3 btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Close</button>
        </div>
      </div>
   
		 </div>
		  
		  <?php elseif($this->Session->read('USER.Register.language_id') == '3'):?>
		  
		   <div class="panel-body">
		
      
      <div class="" style="color:;font-size:15px;">
	  
<div style="margin-bottom:10px;">ಆತ್ಮೀಯ  <b><?php echo ucfirst(strtolower($this->Session->read('USER.Register.first_name')));?></b>, </div>
<div style="margin-bottom:10px;text-align:justify">
ನಿಮ್ಮನ್ನು ಉತ್ತಮವಾಗಿ ಅರ್ಥ ಮಾಡಿಕೊಳ್ಳಲು ಸಹಾಯವಾಗಲೆಂದು ಈ ಸರಳ ಪರೀಕ್ಷೆಯನ್ನು ವಿನ್ಯಾಸಗೊಳಸಲಾಗಿದೆ.  ಕೆಳಗೆ ಪಟ್ಟಿಯಲ್ಲಿರುವÀ ಹೇಳಿಕೆಗಳಿಗೆ ನಿಮ್ಮ ಪ್ರಾಮಾಣಿಕ/ಸರಳ ಪ್ತತಿಕ್ರಿಯೆಯನ್ನು ನಾವು ಎದುರು ನೋಡುತ್ತಿದ್ದೇವೆ. ನಿಮ್ಮ ಪ್ರತಿಕ್ತಿಯೆಯನ್ನು ಗೌಪ್ಯವಾಗಿ ಇಡಲಾಗುತ್ತದೆ ಮತ್ತು ಅಧಿಕೃತ ಉದ್ದೇಶಕ್ಕಾಗಿ ಮಾತ್ರ ಬಳಸಲಾಗುತ್ತದೆ.  <br><br>
Kindly follow the below-given guidelines: <br>
<ol style="margin-top:10px;">
<li>There are totally 4 Situations and 27 Questions. </li>
<li>ಎಲ್ಲಾ ಹೇಳಿಕೆಗಳಿಗೆ ತಪ್ಪದೆ ಪ್ರತಿಕ್ರಿಯಿಸಿ</li>
<li>ನಿಮ್ಮ ಮನಸ್ಸಿನ ‘ಉನ್ನತ ಪ್ರತಿಕ್ರಿಯೆಯನ್ನು’ ಹಂಚಿಕೊಳ್ಳಿ </li>
<li style="line-height:33px;">ನಿಮ್ಮ ಎಲ್ಲಾ ಪ್ರತಿಕ್ರಿಯೆಗಳುನ್ನು ರ್ಯಾಂಕಿಂಗ್ ಮಾದರಿಯಲ್ಲಿ ಮಾತ್ರ ಸಲ್ಲಿಸಬೇಕು ಅಂದರೆ ನಿಮ್ಮ ಪ್ರಕಾರ ಅತ್ಯುತ್ತಮ ಆಯ್ಕೆ ಮೊದಲ ರ್ಯಾಂಕ್ ಪಡೆಯುತ್ತದೆ (1 ಎಂದು ಬರೆಯಿರಿ) ಮತ್ತು  ಕೊನೆಯ ಆಯ್ಕೆ 5ನೇ ರ್ಯಾಂಕ್ ಪಡೆಯುತ್ತದೆ (5 ಎಂದು ಬರೆಯಿರಿ) <br>

ಈ ರೀತಿಯಲ್ಲಿ ಎಲ್ಲಾ ಹೇಳಿಕೆಗಳಿಗೆ ಅದರ ಲ್ಲಿರುವ ಪ್ರತಿ ಪ್ರಶ್ನೆಗಳಿಗೂ ಎಲ್ಲಾ ಪ್ರಶ್ನೆಗಳಿಗೂ 1 ರಿಂದ 5 ರ್ಯಾಂಕ್‍ಗಳನ್ನು ನೀಡುವಂತೆ ನಿರೀಕ್ಷಿಸಲಾಗಿದೆ.

<br>
     ನಿಮ್ಮ ಅಭಿಪ್ರಾಯದಲ್ಲಿ ಪ್ರತಿ ಪ್ರಶ್ನೆಗೂ ರ್ಯಾಂಕ್ ನೀಡುವುದು ಹೆಚ್ಚು ಸೂಕ್ತವಾಗಿರುವುದು</b> 
</li>
<li>ಪ್ರಶ್ನೆಯಲ್ಲಿರುವ ಒಂದಕ್ಕಿಂತ ಹೆಚ್ಚು ಹೇಳಿಕೆಗಳಿಗೆ ಒಂದೇ ರೀತಿಯ ರ್ಯಾಂಕ್‍ನ್ನು ನೀಡಬೇಡಿ. </li>
<li>ಪ್ರತಿ ಪರಿಸ್ಧಿತಿಯನ್ನು ಸಂಪೂರ್ಣವಾಗಿ ಓದಿ ಮತ್ತು ಯಾವುದೇ ಪ್ರಶ್ನೆಗೆ ಪ್ರತಿಕ್ರಿಯಿಸುವ ಮೊದಲು ಮೇಲೆ ತಿಳಿಸಿರುವ ಪ್ರಶ್ನೆಗೆ ಪರಿಸ್ಧಿತಿಯನ್ನು ಸಂಬಂಧಿಸಿ.</li>

</ol>
 <div style="margin-top:20px;font-weight:bold;margin-left:30px;">
ಈ ಪರೀಕ್ಷೆಗೆ ನೀಡಿರುವ ಸಮಯ 60 ನಿಮಿಷಗಳು.</div>

</div>

        <div class="form-group text-center">
          <button type="button" class="confirmReadT3 btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Proceed</button>
        </div>
      </div>
   
		 </div>
		  
		  
		  <?php endif; ?>
	 
		 </div>
		 
		 
		 
                  <div class="panel" style="background:#fcfcfc;">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> <b style="font-size:16px;">TEST 2: QUESTIONS</b></span> </div>
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
		 <?php echo $this->Form->create('Test2', array( 'id' => 'testForm2', 'class' => 'cmxform formID testForm2')); ?>
 
              <span id="logical">
              <ol type="1" style="list-style-type:none;">
              	 <?php 
				 $page = $this->request->params['named']['page'] ? $this->request->params['named']['page'] : '1';
				 $serial = ($page * 1);?> 
             <?php foreach($test_data as $test):?>
             	 <div class="form-group" >
					<li>	
						<div style="text-align:justify;font-size:13px;">
						<span style="font-size:16px;font-weight:bold;">Situation <?php echo $serial++;?>.</span>
						<div style="margin-top:8px;font-size:15px;width:93%;line-height:28px;">
						<?php echo str_replace( "\n", '<div style="margin-bottom:8px;"></div>', $test['Test2']['situation'] ); 
						// echo nl2br($test['Test2']['situation']);?></div></div>
						
						<?php $ques = explode('|', $test[0]['questions']);
							$ques_id = explode(',', $test[0]['qn_id']);
							$rank1 = explode(',', $test[0]['rank1_text']);
							$rank2 = explode(',', $test[0]['rank2_text']);
								?>						
						
						<?php $i = 0;
						
						foreach($ques as $q_key => $q):?>
<div style="font-size:12px;font-weight:bold;margin-top:35px;line-height:28px;clear:left;">


<div style="width:30px;float:left;"><span style="font-size:20px;font-weight:bold;"><?php echo ++$q_key;?>.</div>
<div style="float:left;font-size:15px;width:80%;font-weight:bold;"><?php echo trim($q);?></div>
						
					
						</div> 
						
						<div style="clear:left;padding:15px;0px">
						<span style="font-size:14px;font-weight:normal;margin-left:30px;"><?php echo $rank1[$i];?></span> 
						<span style="font-size:14px;margin-left:240px;font-weight:normal;"><?php echo $rank2[$i];?></span>
						</div>
						
						
						<?php $options = explode('|', $option_data['opt_name'][$i]);
						$opt_id = explode(',', $option_data['opt_id'][$i]);
			if(count($options) > 1):
						foreach($options as $key => $op):?>
						
						<?php 
						if (array_key_exists($opt_id[$key], $optResult)):
						$value = $optResult[$opt_id[$key]];
						else:
						$value = '';
						endif;
						
						?>
						
						
						
			<div style="font-size:13px;padding-top:15px;padding-bottom:30px;margin-left:35px;"> 
				<div style="width:50px;float:left;clear:left">
						
		
			
			<input type="text" autocomplete="off" class="rankAns required validateUnique_<?php echo $q_key;?>" val="<?php echo $q_key;?>" value="<?php echo $value;?>" name="option_rank[]" rel="<?php echo $ques_id[$i].'_'.$opt_id[$key];?>" 
			id="<?php echo $ques_id[$i].'_'.$opt_id[$key];?>_<?php echo $q_key;?>" style = "margin-right:8px;padding-left:10px;padding-right:10px;width:40px;border:1px solid #e0dbdb;"	maxlength = "1"/>
			
			<input type="hidden" name="rankReal[]" value="<?php echo $ques_id[$i].'_'.$opt_id[$key];?>_<?php echo $value;?>" id="<?php echo $ques_id[$i].'_'.$opt_id[$key];?>"> 
			</div>
			<div style="float:left;width:80%;line-height:26px;">
			<?php echo trim($op);?>
						
		</div>

				</div>		
						<?php endforeach; unset($options);?>
						<?php endif; ?>
						<?php $i++;?>

						<?php endforeach;?>
						<?php unset($ques); ?>
						
					 </li>
             	 </div>
				
				<?php endforeach; ?>
				
				
			</ol>
				   <div class="form-group" style="float:left;margin-left:30px;">
               <?php echo $this->element('paging');?>
				  <input type="hidden" id="total_hr" value="<?php echo $remain_time;?>">
				   <input type="hidden" id="total_sec" value="<?php echo $remain_sec;?>">
				     <input type="hidden" id="valid_pass" value="0">
				   <input type="hidden" id="test2" value="<?php echo $total_answered;?>">
				   	<input type="hidden" id="test2_form" value="1">
<?php echo $this->Form->input('alertT3', array('value' => $this->Session->read('USER.Register.ins_read_t3'), 'id' => 'alertT3', 'type' => 'hidden'));?>
  <input type="hidden" id="test_direct3" value="<?php echo $this->webroot;?>test2/index/ins3:read">
				   <?php echo $this->Form->input('test_complete', array( 'id' => 'test_complete', 'type' => 'hidden'));?>
				    <input type="hidden" id="test_time" value="<?php echo $this->webroot;?>test2/timeout/">
   <input type="hidden" id="cur_page" value="<?php echo $this->request->params['named']['page'] ? $this->request->params['named']['page'] : 1 ;?>"/>

                </div>
			 <?php  if($this->request->params['named']['page'] == $this->Paginator->counter('{:pages}')):?>
				    <a href="#" data-toggle="modal" data-target="#alertModal">
					<button type="submit" data-toggle="tooltip" title="Complete TEST 2 and Finish the Tests" class="btn btn-sm bg-green2 pull-right" style="margin-right:100px;">
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
          <button type="button" class="confirmBox2 btn btn-success btn-gradient mr5"><i class="fa fa-check"></i> Yes</button>
          <button type="button" class="btn btn-danger btn-gradient" data-dismiss="modal"><i class="fa fa-warning"></i> No</button>
        </div>
      </div>
    </div>
  </div>
</div>


