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
            <div class="panel-heading"> <span class="panel-title"><i class="fa fa-pencil"></i> View Online Test </span>
              <ul class="nav panel-tabs">
			   <li class="active"><a href="#tab0" data-toggle="tab">Test Details</a></li>
                <li class=""><a href="#tab1" data-toggle="tab">QA - <b>English</b></a></li>
                <li class=""><a href="#tab2" data-toggle="tab">QA - <b>Hindi</b></a></li>
                <li class=""><a href="#tab3" data-toggle="tab">QA - <b>Tamil</b></a></li>
              </ul>
            </div>
            <div class="panel-body pn">
              <div class="tab-content border-none pn">
                
				<div id="tab0" class="tab-pane p15 active">
                    <div class="row">
        <div class="col-md-12">
          
              
			
              <!-- div class="alert alert-theme">Please check the following errors! </div-->
			  
              <form class="cmxform" id="altForm" method="post" novalidate="novalidate">
               
			<div class="form-group">
                  <label for="wage">Company <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option>Wipro Technologies</option>
				  <option>Infosys Technologies</option>
				 
				  </select>
				  <label for="wage" class="error">Please select the company name</label>
                </div>
				
				<div class="form-group">
                  <label for="wage">Project <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option>Project 1</option>
				  <option>Project 2</option>
				 
				  </select>
				  <label for="wage" class="error">Please select the project</label>
                </div>
				
				<div class="form-group">
                  <label for="wage">Test Name <span class="mandate">*</span></label>
                  <input type="text"  class="form-control"/>
				  
				  <label for="wage" class="error">Please enter the test name</label>
                </div>
				
				<div class="form-group">
                  <label for="wage">Test Code <span class="mandate">*</span></label>
                  <input type="text"  class="form-control"/>
				  
				  <label for="wage" class="error">Please enter the test code</label>
                </div>
				
				<div class="form-group">
                  <label for="wage">Test Parameter </label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option>Traits</option>
				  <option selected="selected">Subjects</option>
				  <option>Competency</option>
				  <option>Personality Factor</option>
				  </select>
                </div>
				
				
				<div class="form-group">
                  <label for="wage">Test Type <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option selected="selected">Aptitude Test</option>
				  <option>Technical Test</option>
				  <option>Personal Profiling</option>
				  <option>Situational Response</option>
				  <option>2 Statement Questions</option>
				  </select>
				  <label for="wage" class="error">Please select the test type</label>
                </div>
				
				
				<div class="form-group">
                  <label for="wage">Languages <span class="mandate">*</span></label>
                 <select id="multiselect2" style="width:98%" multiple="multiple">
				  <option value="cheese" selected> English</option>
                  <option value="tomatoes" selected> Tamil</option>
                  <option value="mozarella" selected> Hindi</option>
                  <option value="mushrooms"> Telugu</option>
                  <option value="pepperoni"> Malayalam</option>
                  <option value="onions"> Urdu</option>
                </select>
				  <label for="wage" class="error">Please select the languages</label>
                </div>
				
				
				<div class="form-group">
                  <label for="wage">No. of Questions <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				 <option>5</option>
				 <option>6</option>
				 <option>7</option>
				 <option>8</option>
				 <option>9</option>
				 <option>10</option>
				 <option>11</option>
				 <option>12</option>
				 <option>13</option>
				 <option>14</option>
				 <option>15</option>
				 <option>16</option>
				 <option>17</option>
				 <option>18</option>
				 <option>19</option>
				 <option>20</option>
				 <option>21</option>
				 <option>22</option>
				 <option>23</option>
				 <option>24</option>
				 <option>25</option>
				  </select>
				  <label for="wage" class="error">Please select the no. of questions</label>
                </div>
				
				<div class="form-group">
                  <label for="name">Question Type   <span class="mandate">*</span>  </label> <br>
                  <label class="radio-inline mr10">
                      <input type="radio" name="type" id="text" value="text">
                     Text </label>
					  <label class="radio-inline mr10">
                      <input type="radio" name="type" id="image" value="image">
                     Image</label>
                <label class="radio-inline mr10">
                      <input type="radio" name="type" id="both" value="both">
                     Both</label>  <br>
				  <label for="name" class="error">Please select the question type</label>
                </div>
				
				
				<div class="form-group">
                  <label for="name">No. of Options <span class="mandate">*</span></label>
           <select id="no_opt" name="no_opt" class="form-control">
            <option>Select</option>
          <option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>				 
				  </select> <br>
				  	<label for="name" class="error">Please select the no. of options</label>
                </div>
				
				<div class="form-group">
                  <label for="name">Option Type    <span class="mandate">*</span> </label> <br>
                  <label class="radio-inline mr10">
                      <input type="radio" name="op_type" onclick="no_quest_opt();" id="op_text" value="text">
                     Text </label>
					  <label class="radio-inline mr10">
                      <input type="radio" name="op_type" onclick="no_quest_opt();" id="op_image" value="image">
                     Image</label>
                <label class="radio-inline mr10">
                      <input type="radio" name="op_type" onclick="no_quest_opt();" id="op_both" value="both">
                     Both</label> <br>
				  <label for="name" class="error">Please select the option type</label>
                </div>
				
				<div class="form-group">
                  <label for="wage">Option Values <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option>Same Options Only</option>
				  <option>Different Option Values</option>
				 
				  </select>
				  <label for="wage" class="error">Please select the option values</label>
                </div>
				
				<!--div class="form-group">
                  <label for="name">Competency Name</label>
				<select  class="form-control">
				  <option>Select</option>
				  <option>Problem Solving</option>
				  <option>Discipline</option>
				  <option>Time Management</option>				 
				  </select>                
				  </div>
				  
				   <div class="form-group">
                  <label for="name">Behaviour</label>
				<select  class="form-control">
				  <option>Select</option>
				  <option>Desired</option>
				  <option>Inappropriate</option>
				  <option>Moderate</option>				 
				  </select> 
				  </div-->
				  
				
									
									
		
                
				 <div class="form-group">
                  <label> Status <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option selected="selected">Active</option>
				  <option>Inactive</option>				 
				  </select>
                </div>
				
                <div class="form-group">
				 <!-- <a href="drive.php"><input class="btn btn-default pull-left" type="button" value="Cancel"></a> -->
				 <a href="ot.php"><input type="button" value="Close" class="btn btn-default pull-left"></a>

                </div>
			
              </form>
           
			
		
        </div>
        <div class="clearfix"></div>
      </div>
     

			   </div>
              
				<div id="tab1" class="tab-pane">
                   <div class="row">
				<div class="col-md-12">
          
               <div class="">
		  
            <div class="panel-body">
			
              <!-- div class="alert alert-theme">Please check the following errors! </div-->
			  
              <form class="cmxform" id="altForm2" method="post" novalidate="novalidate">
               
			
				  <div class="form-group">
                  <label for="wage">Subject <span class="mandate">*</span></label>
                  <select  class="form-control">
				   <option>Select</option>
				  <option>General Knowledge</option>
				  <option>Logical Reasoning</option>
				  <option>Grammar</option>
				  </select>
				  				  <label for="name" class="error">Please select the subject</label>

                </div>
				
				 <div class="form-group">
                  <label for="name">Question 1 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="Please enter the question 1" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 1</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch1" type="checkbox">
                  <label for="exampleCheckboxSwitch1"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch2" type="checkbox">
                  <label for="exampleCheckboxSwitch2"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch3" type="checkbox">
                  <label for="exampleCheckboxSwitch3"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch4" type="checkbox">
                  <label for="exampleCheckboxSwitch4"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch5" type="checkbox">
                  <label for="exampleCheckboxSwitch5"></label>
                </div>
									
									</div>
                					</div>
									
									
		
                 <div class="form-group">
                  <label for="name">Question 2 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" type="text" placeholder="Please enter the question 2" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 2</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch6" type="checkbox">
                  <label for="exampleCheckboxSwitch6"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch7" type="checkbox">
                  <label for="exampleCheckboxSwitch7"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch8" type="checkbox">
                  <label for="exampleCheckboxSwitch8"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch9" type="checkbox">
                  <label for="exampleCheckboxSwitch9"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch10" type="checkbox">
                  <label for="exampleCheckboxSwitch10"></label>
                </div>
									
									</div>
                					</div>
									
				<div class="form-group">
                  <label for="name">Question 3 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="Please enter the question 3" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 3</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch11" type="checkbox">
                  <label for="exampleCheckboxSwitch11"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch12" type="checkbox">
                  <label for="exampleCheckboxSwitch12"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch13" type="checkbox">
                  <label for="exampleCheckboxSwitch13"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch14" type="checkbox">
                  <label for="exampleCheckboxSwitch14"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="Option 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch15" type="checkbox">
                  <label for="exampleCheckboxSwitch15"></label>
                </div>
									
									</div>
                					</div>
									
						
				
				
         <div class="form-group">
				 <!-- <a href="drive.php"><input class="btn btn-default pull-left" type="button" value="Cancel"></a> -->
				 <a href="ot.php"><input type="button" value="Close" class="btn btn-default pull-left"></a>

                </div>
			
              </form>
           
			
		 </div> </div>
        </div>
        <div class="clearfix"></div>
      </div>
     
				</div>
				<div id="tab2" class="tab-pane">
                   <div class="row">
				<div class="col-md-12">
          
               <div class="">
		  
            <div class="panel-body">
			
              <!-- div class="alert alert-theme">Please check the following errors! </div-->
			  
              <form class="cmxform" id="altForm2" method="post" novalidate="novalidate">
               
			
				  
				 <div class="form-group">
                  <label for="name">Question 1 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="कृपया प्रश्न 1 दर्ज करें" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 1</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch16" type="checkbox">
                  <label for="exampleCheckboxSwitch16"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch17" type="checkbox">
                  <label for="exampleCheckboxSwitch17"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch18" type="checkbox">
                  <label for="exampleCheckboxSwitch18"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch19" type="checkbox">
                  <label for="exampleCheckboxSwitch19"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch20" type="checkbox">
                  <label for="exampleCheckboxSwitch20"></label>
                </div>
									
									</div>
                					</div>
									
									
		
                 <div class="form-group">
                  <label for="name">Question 2 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="कृपया प्रश्न 2 दर्ज करें"  type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 2</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch21" type="checkbox">
                  <label for="exampleCheckboxSwitch21"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch22" type="checkbox">
                  <label for="exampleCheckboxSwitch22"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch23" type="checkbox">
                  <label for="exampleCheckboxSwitch23"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch24" type="checkbox">
                  <label for="exampleCheckboxSwitch24"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch25" type="checkbox">
                  <label for="exampleCheckboxSwitch25"></label>
                </div>
									
									</div>
                					</div>
									
				<div class="form-group">
                  <label for="name">Question 3 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="कृपया प्रश्न 3 दर्ज करें"  type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 3</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch26" type="checkbox">
                  <label for="exampleCheckboxSwitch26"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch27" type="checkbox">
                  <label for="exampleCheckboxSwitch27"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch28" type="checkbox">
                  <label for="exampleCheckboxSwitch28"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch29" type="checkbox">
                  <label for="exampleCheckboxSwitch29"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="विकल्प 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch30" type="checkbox">
                  <label for="exampleCheckboxSwitch30"></label>
                </div>
									
									</div>
                					</div>
									
						
				
				
        <div class="form-group">
				 <!-- <a href="drive.php"><input class="btn btn-default pull-left" type="button" value="Cancel"></a> -->
				 <a href="ot.php"><input type="button" value="Close" class="btn btn-default pull-left"></a>

                </div>
			
              </form>
           
			
		 </div> </div>
        </div>
        <div class="clearfix"></div>
      </div>
     
                </div>
                <div id="tab3" class="tab-pane p15">
                  
				 <div class="row">
				<div class="col-md-12">
          
               <div class="">
		  
            <div class="">
			
              <!-- div class="alert alert-theme">Please check the following errors! </div-->
			  
              <form class="cmxform" id="altForm2" method="post" novalidate="novalidate">
               
			
				  
				 <div class="form-group">
                  <label for="name">Question 1 <span class="mandate">*</span></label>
                  <textarea id="name" name="name" placeholder="தயவுசெய்து கேள்வி 1 ஐ உள்ளிடுக" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 1</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch31" type="checkbox">
                  <label for="exampleCheckboxSwitch31"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch32" type="checkbox">
                  <label for="exampleCheckboxSwitch32"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch33" type="checkbox">
                  <label for="exampleCheckboxSwitch33"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch34" type="checkbox">
                  <label for="exampleCheckboxSwitch34"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch35" type="checkbox">
                  <label for="exampleCheckboxSwitch35"></label>
                </div>
									
									</div>
                					</div>
									
									
		
                 <div class="form-group">
                  <label for="name">Question 2 <span class="mandate">*</span></label>
                  <textarea id="name" name="name"  placeholder="தயவுசெய்து கேள்வி 2 ஐ உள்ளிடுக" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 2</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch36" type="checkbox">
                  <label for="exampleCheckboxSwitch36"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch37" type="checkbox">
                  <label for="exampleCheckboxSwitch37"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch38" type="checkbox">
                  <label for="exampleCheckboxSwitch38"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch39" type="checkbox">
                  <label for="exampleCheckboxSwitch39"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch40" type="checkbox">
                  <label for="exampleCheckboxSwitch40"></label>
                </div>
									
									</div>
                					</div>
									
				<div class="form-group">
                  <label for="name">Question 3 <span class="mandate">*</span></label>
                  <textarea id="name" name="name"  placeholder="தயவுசெய்து கேள்வி 3 ஐ உள்ளிடுக" type="text" class="form-control error" required=""></textarea>
				  
				  <label for="name" class="error">Please enter the question 3</label>
                </div>
				
				
				
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 1 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 1" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch41" type="checkbox">
                  <label for="exampleCheckboxSwitch41"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 2 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 2" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">

			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch42" type="checkbox">
                  <label for="exampleCheckboxSwitch42"></label>
                </div>

</div>								
                					</div>
				<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 3 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 3" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
												<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch43" type="checkbox">
                  <label for="exampleCheckboxSwitch43"></label>
                </div>
									
									</div>
				   					<label for="name" class="col-md-1"> Option 4 </label>
                  				<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 4" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>	
<div class="col-xs-1">
			<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch44" type="checkbox">
                  <label for="exampleCheckboxSwitch44"></label>
                </div>

</div>								
                					</div>
	        	<div class="row form-group">
                  				<label for="name" class="col-md-1">Option 5 </label>
                 					<div class="col-xs-4"><input id="name0" name="name0" type="text" class="form-control error" placeholder="விருப்பம் 5" required="" idtemplate="name%23index%23" nametemplate="name%23index%23"></div>
									<div class="col-xs-1">
									
									<div class="switch switch-purple switch-lg switch-inline">
                  <input id="exampleCheckboxSwitch45" type="checkbox">
                  <label for="exampleCheckboxSwitch45"></label>
                </div>
									
									</div>
                					</div>
									
						
				
				
      <div class="form-group">
				 <!-- <a href="drive.php"><input class="btn btn-default pull-left" type="button" value="Cancel"></a> -->
				 <a href="ot.php"><input type="button" value="Close" class="btn btn-default pull-left"></a>

                </div>
              </form>
           
			
		 </div> </div>
        </div>
        <div class="clearfix"></div>
      </div>
     
				</div>
              </div>
            </div>
			
           

		 </div>
        </div>
      

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
<link rel="stylesheet" media="screen" href="../vendor/jquery/jquery_ui/jquery-ui.min.css">	

{literal}
<script>
jQuery(document).ready(function () {	  
	 "use strict";    
	 
	$('#multiselect2').multiselect({
		includeSelectAllOption: true
	});
	
});
</script>
<script type="text/javascript" src="../vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
{/literal}