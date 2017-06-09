<!-- Start: Header navbar-fixed-top -->
<header class="navbar navbar-white-text bg-blue5-alt">
  <div class="navbar-branding"> <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span> 
  <a class="navbar-brand" href="#" style="color:#ffffff;font-weight:bold;font-size:15px;">AssessKey</a> </div>
  </header>
 
<!-- Start: Main -->
<div id="main">   
  
 <!-- Start: Sidebar -->
  <aside id="sidebar_left" class="leftDiv">
    <div class="user-info">
      <div class="media">
        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
        <div class="media-body">
          <h5 class="media-heading mt5 mbn fw700 cursor">HI, <?php echo ucfirst($this->Session->read('ADMUSER.Admin.full_name'));?></h5>
          <div class="media-links fs11"><i class="fa fa-circle text-muted fs3 p8 va-m"></i><a href="<?php echo $this->webroot;?>admin/logout/">Sign Out</a></div>
        </div>
      </div>
    </div>
    <div class="user-divider"></div>
	
  </aside>
    
  <!-- Start: Content -->
  <section id="content_wrapper">
  
    <div id="content">
      
      <?php echo $this->Session->flash();?>
	  
      <div class="row">
        <div class="col-md-12">
                  <div class="panel" style="background:#fcfcfc;">
		  
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Reports </span> </div>
            <div class="panel-body">
			
		<?php echo $this->Form->create('Home', array( 'id' => 'admExport', 'class' => 'cmxform  Report')); ?>

             <div class="form-group">
                  <label for="name">Mobile</label>
				  
<?php echo $this->Form->input('mobile', array('id' => 'mobile', 'div'=> false,'type' => 'text', 'label' => false,
				'class' => 'form-control', 'placeholder' => 'Pls enter 10 digit mobile number',
				'error' =>  array('attributes' => array('wrap' => 'label', 'class' => 'error')))); ?> 

				 
                </div>
			
<div class="form-group">
		
		
				<?php if($graphChart == 'done'):?>
				  <input class="submit btn bg-green2 pull-left downloadPDF" type="submit" value="Download">
				 <a href="<?php echo $this->webroot;?>home/">
				 <input class="submit btn bg-grey2 pull-left" style="margin-left:10px" type="button" value="Refresh" style="margin-right:25px;">
				 </a>

				<?php endif; ?>
                  <input class="submit btn bg-orange2 pull-right" type="submit" value="Submit">
				  
				 <input class="submit btn bg-yellow2 pull-right exportExcel" type="submit" value="Export Excel" style="margin-right:25px;">
					
                </div>
				
				<?php echo $this->Form->input('hdnData', array('div'=> false,'type' => 'hidden', 'id' => 'hdnData'));?>
				<?php echo $this->Form->input('hdnExcel', array('value' => $excelDone, 'div'=> false,'type' => 'hidden', 'id' => 'hdnExcel'));?>

              </form>
           
			
			</div>
          </div>
                

        </div>
       
	  </div>
	  
    </div>
  
  </section>
  
  </div>
  

<?php if(empty($this->request->data['Home']['hdnData']) && !empty($this->request->data) && empty($this->request->data['Home']['hdnExcel'])):?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Competencies", "Avg. Score", { role: "style" } ],
		<?php foreach($avg_data as $key => $data):?>
		['<?php echo $chapter_graph[$key]?>', <?php echo $data;?>, "color:<?php echo $colors[$key];?>"],
		<?php endforeach;?>
		
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Competency Wise Scores Table",
        width: 700,
        height: 400,
        bar: {groupWidth: "45%"},
        legend: { position: "none" }
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
	  
	 // document.getElementById('png').outerHTML = '<a href="' + chart.getImageURI() + '">Printable version</a>';
	 
	    document.getElementById('barchart_values').style.display = 'none';
		document.getElementById('hdnData').value = chart.getImageURI();
 }
</script>
<div id="barchart_values" style="width: 900px; height: 300px;" style="display:none;"></div>
	  
<?php endif; ?>

<!-- End #Main -->