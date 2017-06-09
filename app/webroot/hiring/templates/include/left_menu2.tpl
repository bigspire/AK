<?php session_start();
// echo $_SESSION['login_type'];
?>

 <!-- Start: Sidebar -->
  <aside id="sidebar_left" class="leftDiv">
    <div class="user-info">
      <div class="media"> <a class="pull-left" href="#">
        <div class="media-object border border-purple br64 bw2 p2"> <img class="br64" src="img/avatars/6.jpg" alt="..."> </div>
        </a>
        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
        <div class="media-body">
          <h5 class="media-heading mt5 mbn fw700 cursor">Vinoth Kumar<span class="caret ml5"></span></h5>
          <div class="media-links fs11"><i class="fa fa-circle text-muted fs3 p8 va-m"></i><a href="login.php">Sign Out</a></div>
        </div>
      </div>
    </div>
    <div class="user-divider"></div>
	<div class="sidebar-menu">
      <ul class="nav">
       <?php if($_SESSION['login_type'] != '1'){ ?>
        <li class=""> <a href="home.php" class="<?php echo $wfn->set_menu_active('home');?>"><span class="glyphicons glyphicons-home"></span> <span class="sidebar-title">Dashboard</span> </a> </li>
         <?php if($_SESSION['login_type'] != '2') {?>
        <li  class=""> <a class="<?php echo $wfn->set_menu_active('add_company');?> <?php echo $wfn->set_menu_active('edit_company');?> <?php echo $wfn->set_menu_active('company');?> accordion-toggle" href="company.php">
        <span class=" glyphicons glyphicons-building"></span><span class="sidebar-title">Companies</span> 
        <span class="sidebar-title-tray"> <span class="label label-xs bg-purple2">4 New</span> </span> </a> 
       <ul id="resources" class="nav sub-nav">
            <li><a class="" href="company.php"><span class="glyphicons glyphicons-search"></span> Search Company </a></li>
            <li class="divider"></li>
            <li><a  href="add_company.php"><span class="fa fa-plus"></span> Add Company </a></li>

          </ul>
          </li>
          <?php }?>
        <li> <a class="<?php echo $wfn->set_menu_active('project');?> accordion-toggle"  href="#resources">
        <span class="glyphicons glyphicons-folder_open"></span><span class="sidebar-title">Projects</span><span class="caret"></span></a>
          <ul id="resources" class="nav sub-nav">
            <li><a class="" href="project.php"><span class="glyphicons glyphicons-search"></span> Search Projects </a></li>
            <li class="divider"></li>
            <li><a  href="add_project.php"><span class="fa fa-plus"></span> Add Projects </a></li>

          </ul>
        </li>
        <li> <a class="<?php echo $wfn->set_menu_active('add_drive');?> <?php echo $wfn->set_menu_active('edit_drive');?> accordion-toggle" href="#sideOne"><span class="glyphicons glyphicons-adjust_alt"></span><span class="sidebar-title">Campus Drive</span><span class="caret"></span></a>
          <ul id="sideOne" class="nav sub-nav">
            <li><a href="drive.php"><span class="glyphicons glyphicons-search"></span> Search Drives</a></li>
            <li><a href="add_drive.php"><span class="fa fa-plus"></span> Add Drives</a></li>          
          </ul>
        </li>
        <li> <a class="<?php echo $wfn->set_menu_active('candidate');?> accordion-toggle" href="#sideTwo"><span class="glyphicons glyphicons-vcard"></span><span class="sidebar-title">Candidate Enrollments</span><span class="caret"></span></a>
          <ul id="sideTwo" class="nav sub-nav">
            <li><a href="candidate.php"><span class="glyphicons glyphicons-search"></span> Search Candidates</a></li>
            <li><a href="add_candidate.php"><span class="fa fa-plus"></span> Add Candidates</a></li>
           
          </ul>
        </li>
        <li> <a class="
       
        <?php echo $wfn->set_menu_active('add_chapter');?><?php echo $wfn->set_menu_active('chapters');?>
        <?php echo $wfn->set_menu_active('assessment');?> accordion-toggle" href="#sideSix">
        <span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Online Tests</span><span class="caret"></span></a>
          <ul id="sideSix" class="nav sub-nav">
           <li> <a class="<?php echo $wfn->set_menu_active('add_chapter');?><?php echo $wfn->set_menu_active('chapters');?> accordion-toggle" href="#sideSix">
        		<span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Chapters</span><span class="caret"></span></a>
                  <ul id="sideSix" class="nav sub-nav">
                   <li><a href="chapters.php"><span class="glyphicons glyphicons-global"></span>Search Chapters</a></li>
                   <li><a href="add_chapter.php"><span class="glyphicons glyphicons-global"></span>Add Chapters</a></li>
                  </ul>
           </li>
                             
           <li> <a class="
                             <?php echo $wfn->set_menu_active('assessment');?> <?php echo $wfn->set_menu_active('assessment');?>accordion-toggle" href="#sideSix">
                  <span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Aptitude Tests</span><span class="caret"></span></a>
                  <ul id="sideSix" class="nav sub-nav">
                              <li><a href="assessment.php"><span class="glyphicons glyphicons-global"></span>Search Aptitude Tests</a></li>
                              <li><a href="add_assessment.php"><span class="glyphicons glyphicons-global"></span>Add Aptitude Tests</a></li>
                  </ul>
          </li> 
          <!--<li> <a class="<?php echo $wfn->set_menu_active('attend_test');?>" href="attend_test.php"><span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Attend Test </span></a>
          </li>-->
          <?php } ?>
	
            <?php if($_SESSION['login_type'] == '1'){ ?>
 			<div id="sidebar" class="sidebar-menu">
					<ul class="nav">
               <li class=""> <a href="#logical" class="active">
					<span class="glyphicons glyphicons-folder_open"></span> <span class="sidebar-title">Logical Reasoning (1-5) </span> </a> </li>
					<li class=""> <a href="#visual">
					<span class="glyphicons glyphicons-folder_open"></span> <span class="sidebar-title">Visual Reasoning (6-10)</span> </a> </li>

					<li class=""> <a href="#math">
					<span class="glyphicons glyphicons-folder_open"></span> <span class="sidebar-title">Mathematical (11-15)</span> </a> </li>

					<li class=""> <a href="#gk">
					<span class="glyphicons glyphicons-folder_open"></span> <span class="sidebar-title">General Knowledge (16-20)</span> </a> </li>
				</ul>
				</div>
				<?php } ?>
				
          
		  
             <?php if($_SESSION['login_type'] != '1'){ ?>                     
            <!--<li><a href="assessment.php"><span class="glyphicons glyphicons-globe_af"></span> Aptitude Tests</a></li>
            <li><a href="assessment.php"><span class="glyphicons glyphicons-vector_path_circle"></span> Language Tests</a></li>
			 <li><a href="assessment.php"><span class="glyphicons glyphicons-vector_path_circle"></span> Technical Tests</a></li>-->
          </ul>
        </li>
        <li> <a class="accordion-toggle <?php echo $wfn->set_menu_active('reports');?>" href="#sideSeven"><span class="glyphicons glyphicons-charts"></span>
        <span class="sidebar-title">Reports</span><span class="caret"></span></a>
          <ul id="sideSeven" class="nav sub-nav">
            <li><a href="reports.php"><span class="glyphicons glyphicons glyphicons-user"></span> Statistics</a></li>
           
          </ul>
        </li>
       <li> <a class="<?php echo $wfn->set_menu_active('configuration');?> <?php echo $wfn->set_menu_active('change_password');?> 
       <?php echo $wfn->set_menu_active('edit_profile');?> accordion-toggle" href="#sideSeven"><span class="glyphicons glyphicons-settings"></span>
        <span class="sidebar-title">Settings</span><span class="caret"></span></a>
          <ul id="sideSeven" class="nav sub-nav">
            <li><a href="configuration.php"><span class="glyphicons glyphicons glyphicons-cogwheel"></span> Configuration</a></li>
            <li><a href="change_password.php"><span class="glyphicons glyphicons-restart"></span> Change Password</a></li>
            <li><a href="edit_profile.php"><span class="glyphicons glyphicons-vcard"></span> Edit Profile</a></li>
           
          </ul>
        </li>
		<?php if($_SESSION['login_type'] != '3'){?>
 <li> <a class="accordion-toggle" href="#sideSeven">
 <span class="glyphicons glyphicons-charts"></span>
        <span class="sidebar-title">Subscription</span><span class="caret"></span></a>
          <ul id="sideSeven" class="nav sub-nav">
            <li><a href="packages.php"><span class="glyphicons glyphicons glyphicons-user"></span> Buy Credits</a></li>
            <li><a href="renew.php"><span class="glyphicons glyphicons-print"></span> Renew Subscription</a></li>
           
          </ul>
        </li>
		<?php } }?>
	 </ul>
	 
	 <div id="content">
	 <div id="widget-dropdown" class="row">
        <!--<div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-envelope text-grey"></i></div>
              <h2 class="mt15 lh15 text-grey2"><b>4</b></h2>
              <h5 class="text-muted">Sections</h5>
            </div>
          </div>
        </div>-->
        <div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-bar-chart-o text-teal"></i></div>
              <h2 class="mt15 lh15 text-teal2"><b>25</b></h2>
              <h5 class="text-muted">Questions</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-overflow mb10">
            <div class="panel-body pn pl20">
              <div class="icon-bg"><i class="fa fa-comments-o text-blue"></i></div>
              <h2 class="mt15 lh15 text-blue2" id="clicked"><b>0</b></h2>
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
  