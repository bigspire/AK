<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = 'CakePHP: the rapid development php framework';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="public" />
<title>AssessKey</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font CSS (Via CDN) -->
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>

<!-- Bootstrap CSS -->
<?php echo  $this->Html->css('../vendor/bootstrap/css/bootstrap.min.css') ?>

<!-- Theme CSS -->
<?php echo  $this->Html->css('vendor.css') ?>
<?php echo  $this->Html->css('theme.css') ?>
<?php echo  $this->Html->css('utility.css') ?>
<?php echo  $this->Html->css('custom.css'); ?>




<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<?php $page = $this->request->params['controller'] == 'test' ||  $this->request->params['controller'] == 'test2' 
|| $this->request->params['controller'] == 'home' ? 'dashboard' : 'login';?>
<body class="minimal <?php echo $page;?>-page">


  <?php  //$this->Flash->render() ?>
  
	
        <?php echo $this->fetch('content') ?>
		
	


<!-- jQuery --> 
<script type="text/javascript" src="<?php echo $this->webroot;?>vendor/jquery/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="<?php echo $this->webroot;?>vendor/jquery/jquery_ui/jquery-ui.min.js"></script> <!-- Bootstrap --> 
<script type="text/javascript" src="<?php echo $this->webroot;?>vendor/bootstrap/js/bootstrap.min.js"></script> 

<!-- Page Plugins --> 
<script type="text/javascript" src="<?php echo $this->webroot;?>vendor/plugins/backstretch/jquery.backstretch.min.js"></script> 

<!-- Theme Javascript --> 
<script type="text/javascript" src="<?php echo $this->webroot;?>js/utility/spin.min.js"></script> 
<script type="text/javascript" src="<?php echo $this->webroot;?>js/utility/underscore-min.js"></script> 
<script type="text/javascript" src="<?php echo $this->webroot;?>js/main.js"></script> 
<script type="text/javascript" src="<?php echo $this->webroot;?>js/ajax.js"></script> 
<script type="text/javascript" src="<?php echo $this->webroot;?>js/custom.js"></script> 

<!--Timer -->
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery.countdownTimer.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery-scrolltofixed-min.js"></script> 



<?php 
$color = '#000000';
if($this->request->params['controller'] == 'register' || $this->request->params['action'] == 'login'):
$color = '#ffffff';
?>
<script type="text/javascript">
jQuery(document).ready(function () {	  
	 "use strict";
     // Init Theme Core 	  
     Core.init();
     // Enable Ajax Loading 	  
     Ajax.init();	 
	 // Init Full Page BG(Backstretch) plugin
  	 $.backstretch("<?php echo $this->webroot;?>img/stock/splash/2.jpg");
});
</script>
<?php endif; ?>

<?php if($this->request->params['controller'] == 'test' || $this->request->params['controller'] == 'test2'):?>
<script type="text/javascript">
$(function(){ 
	$('#hs_timer').countdowntimer({
		 minutes :$('#total_hr').val(),
		 seconds: $('#total_sec').val(),
		 size : "lg",
		 //timeUp : timeIsUp‚
		 expiryUrl : $('#test_time').val()

	});
	
	function timeIsUp() {
		//Code to be executed before the timer expires (before 01:05).
		alert('OOPS! TEST TIME GOT OVER.');
	}
});
</script>
<?php endif; ?>



<footer>


<div style="text-align:center;color:<?php echo $color;?>">
A Product of CareerTree
</div>
</footer>
</body>

	<?php echo $this->element('sql_dump'); ?>

	
</html>