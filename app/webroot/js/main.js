'use strict'; 
/*! main.js - v0.1.1
* http://admindesigns.com/
* Copyright (c) 2013 Admin Designs;*/

// Library of Theme colors for Javascript plug and play use	
var tealColor =  "#a8e9ea",
	teal2Color =  "#2dc5c7",
	teal3Color =  "#1e9093",
	blueColor =  "#9de0f5",
	blue2Color =  "#33bfeb",
	blue3Color =  "#238bc5",
	purpleColor =  "#c7b7e5",
	purple2Color =  "#a287d4",
	purple3Color =  "#715da3",
	pinkColor =  "#ffd1ed",
	pink2Color =  "#ffb2e1",
	pink3Color =  "#ff7fb4",
	redColor =  "#ffac9c",
	red2Color =  "#ff745a",
	red3Color =  "#ff4f3e",
	orangeColor =  "#fbb882",
	orange2Color =  "#f9892e",
	orange3Color =  "#e55e20",
	yellowColor =  "#ffe29c",
	yellow2Color =  "#ffcf5a",
	yellow3Color =  "#ff9d3e",
	greenColor =  "#c6e69c",
	green2Color =  "#a0d65a",
	green3Color =  "#6fa53e",
	greyColor =  "#b0daec",
	grey2Color =  "#6ebbdd",
	grey3Color =  "#4b87ae";

/* Core theme functions required for
 * most of the themes vital functionality */
var Core = function () {
	
    // Delayed Animations
    var runAnimations = function () {

	  // if any element has ".animated-delay" we
	  // stop its animation and set a Timeout
	  $('[data-animate]').each(function () {
		  var This = $(this)
		  var delayTime = $(this).data('animate')[0];
		  var delayAnimation = $(this).data('animate')[1];
		  
 	      var delayAnimate = setTimeout(function () {
			  $(This).removeClass('animated-delay').addClass('animated ' + delayAnimation);
		  }, delayTime); 
		  
	  });
    }
	
    // Header Functions
    var runHeader = function () {
						
		// We use values on text inputs as they are easier than placeholders to style 
		// This clears the value on focus so that it acts more like a placeholder
		$('#HeaderSearch').focus(function() { $(this).val(''); });
    }
	
    // SideMenu Functions
    var runSideMenu = function () {
			
		//  This function is responsible for the following functionality
		//  1. LEFT MENU COLLAPSE
		//  2. LEFT USER MENU COLLAPSE
		//  3. LEFT MENU LINKS COLLASE (dashboard, elements, tables, etc)
		//  4. RIGHT MENU COLLAPSE
		//  5. Monitor and add responsive classes to "body" tag on window resize
	
		var Body = $('body');
		
		// Left SideBar Toggle Mechanics
		// Only 1 Sidebar is open at a time
        var toggleLeftSideMenu = function () {
			// Check state then open menu.
			if ($('body.sidebar-hidden').length || $('body.sidebar-rtl').length) {
				Body.addClass('sidebar-ltr').removeClass('sidebar-hidden sidebar-rtl');
			}
			// Close menu.
			else {
				Body.addClass('sidebar-hidden').removeClass('sidebar-ltr sidebar-rtl');
			}	
        }
		
		// 2. RIGHT SIDEBAR OPEN
        var toggleRightSideMenu = function () {	
			// Check state then close menu.
			if ($('body.sidebar-rtl').length) {
				Body.removeClass('sidebar-rtl');
			}
			// Open menu.
			else {
				Body.addClass('sidebar-rtl').removeClass('sidebar-ltr');
			}
        }

		// 2. LEFT USER MENU COLLAPSE
		// Allow all user menu divs except the profile/signout links to open the child menu
		$('.user-info .media-heading, .user-info .media-object, .media-links > a:first-child').click(function() {
			
			// Toggle Class to signal state change
			$('.user-info, .user-menu').toggleClass('usermenu-open');
			
			// If menu is closed apply animation	
			if ($('.user-info').hasClass('usermenu-open')) {
				$('.user-menu').slideDown('fast');
			}
			// Otherwise slidemenu up and remove any annoying jQuery applied inline styles
			else {
				$('.user-menu').slideUp('fast',function(){$(this).removeClass('show').attr('style','')});
			}
			
		});
		
		
		// 3. LEFT MENU LINKS COLLAPSE
		$('.sidebar-menu ul a.accordion-toggle').click(function(e) {
			
			// Any menu item with the accordion class is a dropdown. Thus we prevent default actions
		    e.preventDefault();
			
			if ($('body').hasClass('sidebar-left-collapsed')) {return;}

			// Before opening menu item check to see if it is a multi-level menu

			// Check to see if the target is a multi-level menu item
			// If it's not we collapse the entire left side menu 
			if (!$(this).parents('ul.sub-nav').hasClass('sub-nav')) {
				$('a.accordion-toggle.menu-open').next('.sub-nav').slideUp('fast', 'swing', function() {
					$(this).attr('style','').prev().removeClass('menu-open');
				});				
			}
			// If it's a multi-level menu item we collapse all open menus that
			// are not a direct parent of the item clicked. This is to prevent
			// collapsing any part/tier of the multi-level menu
			else {
				$(this).next('.sub-nav').slideUp('fast', 'swing', function() {
					$(this).attr('style','').prev().removeClass('menu-open');
				});			
			}
			// Now we expand targeted menu item, add the ".open-menu" class
			// and remove any left over jquery animation attributes
			if (!$(this).hasClass('menu-open')) {
				$(this).next('.sub-nav').slideToggle('fast', 'swing', function() {
					$(this).attr('style','').prev().toggleClass('menu-open');
				});
			}

		 });
		
		// 5. MONITOR AND ADD RESPONSIVE classes to "body" tag on window resize
		var sidebarCheck = function() {
			if ($(window).width() < 1080) {	$('body').addClass('mobile-view').removeClass('sidebar-ltr sidebar-rtl'); }
			else { $('body').removeClass('mobile-view'); }
		}
	
		// Functions Calls
		$("#toggle_sidemenu_l").click(toggleLeftSideMenu);
		$("#toggle_sidemenu_r").click(toggleRightSideMenu);	
        $(window).resize(function() {
			 sidebarCheck();
		});	

    }
	
	// Form related Functions
    var runFormElements = function () {
				
        // Init Bootstrap tooltips, if present 
        if ($("[data-toggle=tooltip]").length) {
            $('[data-toggle=tooltip]').tooltip();
        }
		
		
        // Init Bootstrap persistent tooltips. This prevents a
        // popup from closing if a checkbox it contains is clicked
		$('.dropdown-menu .dropdown-persist').click(function (event) {
			event.stopPropagation();
		});
		$('.dropdown-menu .nav-tabs li a').click(function (event) {
			event.preventDefault();
			event.stopPropagation();
			$(this).tab('show')
		});
		
        // if btn has ".btn-states" class we monitor it for user clicks. On Click we remove
        // the active class from its siblings and give it to the button clicked
        if ($('.btn-states').length) {
            $('.btn-states').click(function () {
                $(this).addClass('active').siblings().removeClass('active');
            });
        }
		
    }

    // Creates Clickable Checklists (header menus/tables)
    var runChecklists = function () {
		
        // Checklist state for table widgets and header menu buttons
        $('#content_wrapper').on('click', '.table-checklist tbody tr, .dropdown-checklist .dropdown-items li', function() {
            $(this).toggleClass('task-checked');
            if ($(this).hasClass('task-checked')) {
                $(this).find('.cBox input').prop("checked", true);
            } else {
                $(this).find('.cBox input').prop("checked", false);
            }
           // $.uniform.update('input.row-checkbox');
        });
		
        // Disable Selection on checklist to prevent excessive text-highlighting
        var disableSelection = function disableSelection() {
            return this.bind(($.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (event) {
                event.preventDefault();
            });
        };
       // $(".table-checklist tbody tr").disableSelection();
    }
		
    // DEMO FUNCTIONS - primarily trash
    var runDemoJS = function () { 
	
	   // HEADER RELATED DEMO JS
	   $('.toggle-color-swap').on('click',function() {
		   var swapColor = $(this).data('swap');
		   var navbar = $('.navbar');
		   var navbarLogo = $('.navbar-brand img');
		  
		   var colors = 'bg-white bg-red2 bg-purple2 bg-purple3 bg-orange2 bg-dark3 bg-brown-alt bg-blue4-alt bg-blue5-alt bg-blue6-alt';
		   
		   if (swapColor === 'bg-white') {
				navbar.removeClass(colors + ' navbar-white-text').addClass(swapColor);
				navbarLogo.attr('src', 'img/logos/header-logo.png');
		   } else {
			   navbar.removeClass(colors).addClass(swapColor + ' navbar-white-text');
			   navbarLogo.attr('src', 'img/logos/header-logo_light.png');
		   }
	   });
	   
	   // HEADER RELATED DEMO JS
	   $('.colorHeader').on('click',function() {
		   var swapColor = $(this).attr('rel');
		   var navbar = $('.navbar');
		   var navbarLogo = $('.navbar-brand img');
		  
		   var colors = 'bg-red2 bg-purple2  bg-orange2  bg-brown-alt bg-blue5-alt';		   
		   
		   navbar.removeClass(colors).addClass(swapColor + ' navbar-white-text');
		  
	   });

		// Header Menu dropdown navigations
		$('.navbar-left > div, .navbar-menus > div').on('show.bs.dropdown', function () {
			
			if ($(this).attr('id') == 'comment_menu') {
				$(this).children('.dropdown-menu').addClass('animated animated-short bounceInRight');
			}
			else {
				$(this).children('.dropdown-menu').addClass('animated animated-shortest flipInX');
			}
		});
		$('.navbar-left > div, .navbar-menus > div').on('hide.bs.dropdown', function () {
			$(this).children('.dropdown-menu').removeClass('animated flipInX bounceInRight');
		});
		
		// THEME SETTING RELATED JS
		
        // Toggles Theme Settings Tray
        $('.skin-toolbox-toggle, .dashboard-widget-tray .btn:last-child').on('click',function () {
            $('#skin-toolbox').toggleClass('toolbox-open');
        });

        // Switch statement for Theme Settings Tray - controls layout changes
        $('#skin-toolbox input[type="checkbox"], #skin-toolbox input[type="radio"]').on('click',function () {
            var id = $(this).attr('id');
            if ($(this).prop('checked')) {
                switch (id) {
                case 'header-option':
                    $('.navbar').addClass('navbar-fixed-top');
                    $('#sidebar-option').attr("disabled", false).parents('label').removeClass('option-disabled');
                    break;
                case 'sidebar-option':
                    $('#sidebar_left').addClass('affix');
                    break;
                case 'breadcrumb-hidden':
                    $('body').addClass('hidden-breadcrumbs');
                    break;
                case 'fullwidth-option':
                    $('body').removeClass('boxed-layout boxed-example wide-layout');
                    break;
                case 'boxed-option':
                    $('body').addClass('boxed-layout boxed-example');
                    $('body').removeClass('fixed-breadcrumbs hidden-breadcrumbs usermenu-hidden');
                    $('#topbar').removeClass('affix');
                    $('#breadcrumb-hidden, #usermenu-hidden').attr('checked', false);
                    break;
                case 'usermenu-hidden':
                    $('body').addClass('usermenu-hidden');
                    break;
                }
            } else {
                switch (id) {
                case 'header-option':
                    $('.navbar').removeClass('navbar-fixed-top');
                    $('#sidebar_left, #topbar').removeClass('affix');
                    $('#sidebar-option').attr("disabled", true).prop('checked', this.checked).parents('label').addClass('option-disabled');
                    break;
                case 'sidebar-option':
                    $('#sidebar_left').removeClass('affix');
                    $('#topbar').removeClass('affix');
                    break;
                case 'breadcrumb-hidden':
                    $('body').removeClass('hidden-breadcrumbs');
                    break;
                case 'usermenu-hidden':
                    $('body').removeClass('usermenu-hidden');
                    break;
                }
            }
        });
	
		var boxtest = localStorage.getItem('boxed');
		var ajaxtest = localStorage.getItem('ajax_loading');
		
		// Check local storage and update on page load
		if (boxtest === 'true') {
			$('#boxed-option').prop('checked', 'true');
		}
		// Check local storage and update on page load
		if (ajaxtest === 'false') {
			$('#ajax-option').prop('checked', false);
		}
		
		// Assign Ajax setting on click
		$('#ajax-option').on('click',function() {
			var ajaxtest = localStorage.getItem('ajax_loading');
			if ($('#ajax-option').prop('checked')) {
				localStorage.setItem('ajax_loading', 'true');
			}
			else {
				localStorage.setItem('ajax_loading', 'false');	
			}
		});
		// Assign boxed-layout setting on click
		$('#boxed-option').on('click',function() {
			localStorage.setItem('boxed', 'true');
		});
		// Assign fullwidth-layout setting on click
		$('#fullwidth-option').on('click',function() {
			localStorage.setItem('boxed', 'false');
		});
		
		
        $(window).load(function() {
			
			// List of all available JS files. We're going to attempt to
			// cache them all after the first page has finished loading.
			// This is for DEMO purposes ONLY
			var scripts = {
				
				// HIGH PRIORITY - Images
				image1: 		 'img/stock/splash/1.jpg',
				image2:		     'img/stock/splash/2.jpg',
				image3: 		 'img/stock/splash/3.jpg',
				image4: 		 'img/stock/splash/4.jpg',
				
				// HIGH PRIORITY
				gmap: 			 'vendor/plugins/map/gmaps.min.js',
				jquerymap:		 'vendor/plugins/gmap/jquery.ui.map.js',
				mixitup: 		 'vendor/plugins/mixitup/jquery.mixitup.min.js',
				mpopup: 		 'vendor/plugins/mfpopup/jquery.magnific-popup.min.js',
				chosen:		  	 'vendor/plugins/chosen/chosen.jquery.js',
				moment:		 	 'vendor/plugins/daterange/moment.min.js',
				globalize:   	 'vendor/plugins/globalize/globalize.js',
	
				// FORM PICKERS
				cpicker: 	  	 'vendor/plugins/colorpicker/bootstrap-colorpicker.js',
				timepicker:      'vendor/plugins/timepicker/bootstrap-timepicker.min.js',
				datepicker:      'vendor/plugins/datepicker/bootstrap-datepicker.js',
				daterange: 	     'vendor/plugins/daterange/daterangepicker.js',
				
				// FORMS
				validate:		 'vendor/plugins/validate/jquery.validate.js',
				masked: 	 	 'vendor/plugins/jquerymask/jquery.maskedinput.min.js',
				
				// FORMS TOOLS
				holder: 	     'vendor/bootstrap/plugins/holder/holder.js',
				tagmanager:      'vendor/plugins/tags/tagmanager.js',
				gritter:         'vendor/plugins/gritter/jquery.gritter.min.js',
				ladda:           'vendor/plugins/ladda/ladda.min.js',
				paginator:		 'vendor/bootstrap/plugins/paginator/bootstrap-paginator.js',
				knob:            'vendor/plugins/jquerydial/jquery.knob.js',
				rangeslider:     'vendor/plugins/rangeslider/jQAllRangeSliders.min.js',
				
				// MED PRIORITY - Large File sizes
				charts:       	 'js/pages/charts.js',
				ckeditorCDN:     'http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js',
				xedit: 			 'vendor/editors/xeditable/js/bootstrap-editable.js',
				summernote:      'vendor/editors/summernote/summernote.js',
				countdown:       'vendor/plugins/countdown/jquery.countdown.js',
				jcrop: 			 'vendor/plugins/imagecrop/jquery.Jcrop.min.js',
				imagezoom: 		 'vendor/plugins/imagezoom/jquery.elevatezoom.min.js',
				sketchpad:       'vendor/plugins/notepad/wPaint.min.js',
				fileupload:      'vendor/bootstrap/plugins/fileupload/fileupload.js',
			};	

			var cacheCheck = function(o) {
				$.each(o, function(i, p) {
					
					if (localStorage.getItem(i) !== 'cached') {
						$.ajax({
							url: p,
							cache: true,
							success: function(data) {
								localStorage.setItem(i, 'cached');
								console.log(localStorage.getItem(i));
							}				
						});
						
					}
					else {}
				});
			}
			// DISABLED BY DEFAULT
			// cacheCheck(scripts);
		});
    }
	
	return {
        init: function () {
            runAnimations();
            runSideMenu();
            runFormElements();
            runChecklists();
            runHeader();
			runDemoJS();
        }
	} 
}();

$(document).ready(function() {
	   	/* function for sticky header */
			if($('.stickyTable').length > 0){
				$('.stickyTable').stickyTableHeaders();
			}
});

$(document).ready(function() {
	// multi select
	// multiple location selection in jquery	
	if(jQuery('.multi_select').length > 0){ 
		$(".multi_select").multiselect({
		minWidth:270,
		height:220}); 
	}
	
	// datepicker
	if($('.datepick').length > 0){	
		$('.datepick').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			format: 'dd/mm/yyyy',
			prevText: "",
			nextText: "",
			autoclose:true,
			startDate:$('#start_date').val(),
			endDate:$('#end_date').val(),
			todayHighlight: false
		});
	}
	
	// for fetch districts
	$("#state").change(function (){
		var statname = $(this).val();
		 	
		 $.ajax({
			url : "get_district.php",
			method : "GET",
			dataType: "json",
			data : {state : statname},
			encode  : false
		})
			.done(function (data){
				//alert(data);
				var div_data = '<option value="">Select</option>';
				$.each(data,function (a,y){ 
				div_data +=  "<option value="+a+">"+y+"</option>";
           });
           //alert(div_data);	
            $('#dist').empty();
            $('#dist').html(div_data); 
			 });
	});
	
	// for fetch project
	$("#company").change(function (){
		var companyname = $(this).val();
		 	
		 $.ajax({
			url : "get_project.php",
			method : "GET",
			dataType: "json",
			data : {company : companyname},
			encode  : false
		})
			.done(function (data){
				var div_data = '<option value="">Project</option>';
				$.each(data,function (a,y){ 
				div_data +=  "<option value="+a+">"+y+"</option>";
           });
           //alert(div_data);	
            $('#project').empty();
            $('#project').html(div_data); 
			 });
	});
	
	// for fetch test type parameter
	$("#test_type_para").change(function (){
		var test_type = $(this).val();		 	
		 $.ajax({
			url : "get_test_type_parameter.php",
			method : "GET",
			dataType: "json",
			data : {test_type : test_type},
			encode  : false
		})
			.done(function (data){
				var div_data = '<option value="">Select</option>';
				$.each(data,function (a,y){ 
				div_data +=  "<option value="+a+">"+y+"</option>";
           });
           //alert(div_data);	
            $('#test_parameter').empty();
				$('#test_parameter').html(div_data); 
			 });
	});
	
	/* update the test parameter */
	$('#test_parameter').change(function(){
		$('#setQP').attr('href', $('#set_qp_url').val()+'?id='+$(this).val());
	});
	
	// for fetch drive
	$("#project").change(function (){
		var projectname = $(this).val();
		 	
		 $.ajax({
			url : "get_drive.php",
			method : "GET",
			dataType: "json",
			data : {project : projectname},
			encode  : false
		})
			.done(function (data){
				var div_data = '<option value="">Drive</option>';
				$.each(data,function (a,y){ 
				div_data +=  "<option value="+a+">"+y+"</option>";
           });
            $('#drive').empty();
            $('#drive').html(div_data); 
			 });
	});
	
	 // for auto complete	search
	 if($('#keyword').length > 0){
		$( "#keyword")
		  .bind( "keydown", function( event ){
			// for asset type search			
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).autocomplete( "instance" ).menu.active ){
				event.preventDefault();
			}
		  })
		  .autocomplete({
			source: function( request, response ) { 
			  $.getJSON( "autocomplete_search.php", {
				term: extractLast( request.term ),page:$('#page').val(),id:$('#id').val(),company_id:$('#comp_id').val()
			  }, response );
			},
			search: function() {
			  // custom minLength
			  var term = extractLast( this.value );
			  if ( term.length < 1 ) {
				return false;
			  }
			 // Displaying the loader. 			  
			  $(this).addClass('ac_loading');
			},
			response: function () {
            $(this).removeClass('ac_loading');
          },
			focus: function() {
			  // prevent value inserted on focus
			  return false;
			},
			select: function( event, ui ){
				if(ui.item.value != 'No Results!'){
				  var terms = split( this.value );
				  // remove the current input
				  terms.pop();
				  // add the selected item
				  terms.push( ui.item.value );
				  // add placeholder to get the comma-and-space at the end
				  terms.push( "" );
				  this.value = terms.join( ", " );
				  return false;
			  }else{
				return false;
			  }
			}
		});
	}
	
	function split( val ){
		  return val.split( /,\s*/ );
		}
		function extractLast( term ) {
		  return split( term ).pop();
		}
	
	 
});

/* function to show the alert message for single record delete */
$(document).ready(function() {    
	$(".bConfirm2").click( function() {
		var id = this.id;	
		jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
			if(r){	
				webroot = $("#web_root").attr('value');
				document.searchFrm.action = webroot+'?id='+id;
				document.searchFrm.submit();				
			}
		});
	});
});

/* edited by ravi on 29-Mar-2017 */
$(document).ready(function() {
	/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		$('button[type=submit]', this).html('Processing...');		
		$('button[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		
	});
});
jQuery(document).ready(function () {
	  
	 "use strict";
     // Init Theme Core 	  
     Core.init();
   
	 // Dashboard Widgets Slidedown
     $('.dashboard-widget-tray .btn:first-child').on('click', function() {
		$('#widget-dropdown').slideToggle('fast'); 
	 });

	 // $('.leftDiv').scrollToFixed();
	



});

  
	/* timer function */
	$(function(){
		/*
		$('#hs_timer').countdowntimer({
		   minutes :40,
		   seconds : 5,
		   size : "lg"
		});
		*/
		
		/* count radio buttons */
		// if($('#test1').length > 0){
			$("input[type='radio']").click(function(){
				var count = parseInt($('#test1').val(), 0) + parseInt($("input:radio:checked").length, 0);
				$('#clicked').html(count);
		   });
		// }
	});
	


	$(document).ready(function (){
	  // $(document).on("scroll", onScroll); 
		// validate the questions
		$('a[rel=next],a[rel=prev]').click(function(event){ 
			event.preventDefault();
			event.stopPropagation();
			var status = validate_test1();
			if(status){
				var action = $(this).attr('href');
				$('#testForm1').attr('action', action);
				$('#testForm1').submit();
			}
		});
		
		/* function to validate the test 1 */
		$('.validatePage').click(function(event){
			event.preventDefault();
			var status = validate_test1();
			if(status){
				var action = $(this).children().attr('href');
				$('#testForm1').attr('action', action);
				$('#testForm1').submit();				
			}
		});
		
		// validate the questions
		$('a[rel=next],a[rel=prev]').click(function(event){
			event.preventDefault();
			event.stopPropagation();
			if($('#test2_form').val() == '1'){				
				var status = validate_test2();
				if(status){
					var action = $(this).attr('href');
					$('#testForm2').attr('action', action);
					$('#testForm2').submit();
				}
			}
		});
		
		/* function to validate the test 1 */
		$('.validatePage2').click(function(event){
			event.preventDefault();
			var status = validate_test2();
			if(status){
				var action = $(this).children().attr('href');
				$('#testForm2').attr('action', action);
				$('#testForm2').submit();				
			}
		});
		
		// when we select the radio option
		$('.opTest1').click(function(){
			$('.opEr_'+$(this).attr('rel')).hide();
		});
		
		/* function to confirm the process */
		$('.confirmBox').click(function(){
			$(this).html('Processing.. Pls wait..');
			$(this).attr("disabled", true);
			$('.btn-danger').hide();
			$('#test_complete').val('1');
			$('#testForm1').submit();
			return false;
		});
		
		$('.confirmBox2').click(function(){
			$(this).hide();
			$('#test_complete').val('1');
			$('#testForm2').submit();
			return false;
		});
		
		/* to change for rank answer */
		$('.rankAns').unbind().change(function(){
			var id = $(this).attr('rel');
			$('#'+id).val(id+'_'+$(this).val());
			// check validate unique
			check_for_duplicate($(this).attr('val'),$(this).attr('id'));
			return false;
		});
		
		/* show the instructions in pop up */
		$(window).load(function(){
			if($('#alertT1').length > 0){
				if($('#alertT1').val() == ''){
					$('#alertT1Modal').modal('show');
				}
			}
			
			if($('#alertT2').length > 0){  
				if($('#alertT2').val() == '' && $('#cur_page').val() == '1'){
					$('#alertT2M').show();
				}else{
					$('#alertT2M').hide();
				}
				
			}
			if($('#alertT3').length > 0){
				if($('#alertT3').val() == ''  && $('#cur_page').val() == '1'){
					$('#alertT3M').show();
				}else{
					$('#alertT3M').hide();
				}
			}
		});
		
		/* function to confirm the read status of tests*/
		$('.confirmReadT1').click(function(){	
			$('#alertT1').val('1');
			location.href = $('#test_direct').val();
			return false;
		});
		$('.confirmReadT2').click(function(){	
			$('#alertT2').val('1');
			location.href = $('#test_direct2').val();
			return false;
		});
		$('.confirmReadT3').click(function(){	
			$('#alertT3').val('1');
			location.href = $('#test_direct3').val();
			return false;
		});
		
		
		$('.closeReadT1').click(function(){	
			$('.insone').slideToggle();
		});
		$('.closeReadT2').click(function(){	
			$('.instwo').slideToggle();
		});
		
		/* for export excel */
		$('.exportExcel').click(function(){ 
			$('#hdnExcel').val(1);
			$('#hdnData').val('');
			$('#admExport').submit();
		});
		
		/* delete the record */
		$('.btnDelete').click(function(){
			$('#listFrm').attr('action', $('#del_page').val());
			$('#listFrm').submit();
		});
		
		$('.delClick').click(function(){
			$('#del_id').attr('value', $(this).attr('id'));
		});
		
		/* show page */
		$('.filterPage').change(function(){
			if($(this).val() != ''){
				location.href = $('#cur_page').val()+'&limit='+$(this).val(); 
			}
		});
		
		/* for export excel */
		$('.downloadPDF').click(function(){ 
			$('#hdnExcel').val('');
			$(this).hide();
			$('#admExport').submit();

		});
		
		/* hide the ins. */
		if($('#cur_page').length > 0){
			if($('#cur_page').val() > 1){ 
				$('.insData').hide();
			}
		}
		
		jQuery('.jsRedirect').click(function() {
			location.href = $(this).attr("href");
		});
		
		/* update the test time */
		if(jQuery('.testTime').length > 0) {
			window.setTimeout(update_cur_time, 60000);
		}
		
		
		function update_cur_time(){
			var jqxhr = $.ajax({
				url: $('#site_root').val()+'register/update_time/'	
			})
			.done(function(html) {
				window.setTimeout(update_cur_time, 60000);
			})
			.fail(function() {
				window.setTimeout(update_cur_time, 60000);
			})
			.always(function() {
					
			});
		}
	});
		
		/* function to validate the test 1 */
		function validate_test1(){
			var status = true;
			var field_length = $('#totQn').val();
			for(var i = 1; i <= field_length; i++){
				// If element has the class required check for a value
				 if(!$('.op_'+i+':checked').val() || $('.op_'+i+':checked').val() == undefined){
					 // alert('Nothing Selected '+i);
					 $('.opEr_'+i).show();
					 status = false;
				 }else{
					 // alert('You have selected : '+$('.op_1:checked').val());
					  $('.opEr_'+i).hide();
				 }	
			}
			return status;
		}

		/* function to validate the test 1 */
		function validate_test2(){
			var submit = true;
			// Loop over form input and select elements		
			$("#testForm2 input[type=text]").each(function(index,elem){			
				// If element has the class required check for a value		
				if($(this).val() == '' &&  $(this).hasClass('required') ) {				
					$(this).addClass('missing');				
					submit = false;				
				} else { 					
					// Remove class incase it had been set on previous try
					$(this).removeClass('missing'); 					
				}	
			});
			

			return submit;
		}

	function onScroll(event){
		var scrollPos = $(document).scrollTop();		
		$('#sidebar a').each(function () {
			var currLink = $(this);
			var refElement = $(currLink.attr("href"));
			if (refElement.position().top <= scrollPos) {
				$('#sidebar ul li a').removeClass("active");
				currLink.addClass("active");
			}
			else{
			//	currLink.removeClass("active");
			}
		});
	}
	
	function check_for_duplicate(qn,qn_id){
		  var value = '';
		  // for check duplicate inventory field values
		  $('.validateUnique_'+qn).each(function (index){ 
			// check for greater value
			var ent_val = $(this).val().trim();
			if(ent_val > '5' || ent_val == '0'){	
				alert('Oops! You entered wrong value! Should be >=1 and <=5');
				$('#'+qn_id).val('');
				$('#'+qn_id).focus();
				return false;
			}
			// check for empty
			if(ent_val != ''){
				// assign the value in array
				value += ent_val+',';	
			}
		  });
		  // if value is not empty
		  if(value != ''){
			// split the string to get total 
			var split_value = value.split(',');
			var total = split_value.length-1;	
			// get unique data		
			var uniqueVals = [];
			$.each(split_value, function(i, el){
				if($.inArray(el, uniqueVals) === -1) uniqueVals.push(el);
			});
			var unique = uniqueVals.length-1;
			if(total != unique){	
				alert('Oops! You entered duplicate value!');
				$('#'+qn_id).val('');
				$('#'+qn_id).focus();
				return false;
			}
					
		  }			
	}
	
jQuery(document).ready(function () {	  
	 
	 /*
	 "use strict";
     // Init Theme Core 	  
     Core.init();
	  // Init Datatables with Tabletools Addon	
	  $('#datatable').dataTable( {
		"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ -1 ] }],
		"oLanguage": { "oPaginate": {"sPrevious": "", "sNext": ""} },
		"iDisplayLength": 8,
		"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		"sDom": 'T<"panel-menu dt-panelmenu"lfr><"clearfix">tip',
		"oTableTools": {
			"sSwfPath": "../vendor/plugins/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
		}
	  });
	  
	  // Add Placeholder text to datatables filter bar
	  $('.dataTables_filter input').attr("placeholder", "Enter Filter Terms Here....");
	  */
	  // Manually Init Chosen on Datatables Filters
	 // $("select[name='datatable_length']").chosen();
	 
	  // Dashboard Widgets Slidedown
      $('.dashboard-widget-tray .btn:first-child').on('click', function() {
		$('#widget-dropdown').slideToggle('fast'); 
	  });	 	 
	  
	  $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	
	   $(".iframe_inner").colorbox({iframe:true, width:"60%", height:"90%"});
  });	
