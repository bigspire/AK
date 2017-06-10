<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 
 for testing
 */
 

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Session', 'Cookie','Functions');


	/* function to disable the browser cache */
	public function disable_cache(){
		$this->disableCache();		 
		header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
		header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
		header( 'Cache-Control: post-check=0, pre-check=0', false ); 
		header( 'Pragma: no-cache'); 
		
	}
	
	/* function to check the users session */
	public function check_session(){ 
		$this->disable_cache(); 
		//$this->Session->destroy();
		if(count($this->Session->read('USER'))){
			return true;
		}else if($this->Cookie->read('KEYUSER') != ''){ 
			$this->loadModel('Register');
			$data = $this->Register->find('first', array('fields' => array('first_name','last_name','email_id','id','mobile','test1_complete','test2_complete','otp','language_id'),
			'conditions' =>array('Register.id' => $this->Functions->decrypt($this->Cookie->read('KEYUSER')), 'is_deleted' => 'N', 'status' => '1')));					
			if(empty($data)){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Attempt', 'default', array('class' => 'alert alert-danger'));				
				$this->redirect('/register/');
			}		
			$this->Session->write('USER', $data);
			return true;
		}else if($this->Cookie->read('KEYUSER') == ''){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-danger'));	
			$this->redirect('/register/');
			// echo "<script>location.href=$this->webroot</script>";
			// $this->redirect('/');
		}else{ 
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-danger'));
			$this->delete_cookie('KEYUSER');	
			$this->redirect('/register/');
		}
	}
	
	
	/* function to check the users session */
	public function check_admin_session(){
		$this->disable_cache(); 
		//$this->Session->destroy();
		if(count($this->Session->read('ADMUSER'))){
			return true;
		}else if($this->Cookie->read('KEYADMUSER') != ''){ 
			$this->loadModel('Admin');
			$data = $this->Admin->find('first', array('fields' => array('full_name','email_id','id'),
			'conditions' =>array('Admin.id' => $this->Functions->decrypt($this->Cookie->read('KEYADMUSER')), 'is_deleted' => 'N', 'status' => '1')));					
			if(empty($data)){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Attempt', 'default', array('class' => 'alert alert-danger'));				
				$this->redirect('/admin/login/');
			}
			$this->Session->write('ADMUSER', $data);
			return true;
		}else if($this->Cookie->read('KEYADMUSER') == ''){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-danger'));	
			$this->redirect('/admin/login/');
			// echo "<script>location.href=$this->webroot</script>";
			// $this->redirect('/');
		}else{ 
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-danger'));
			$this->delete_cookie('KEYADMUSER');	
			$this->redirect('/admin/login/');
		}
	}
	
		
	/* function to delete cookie */
	public function delete_cookie($name){		  
		$this->Cookie->delete($name); 

	}
	
	public function clear_history(){
		$this->Session->destroy();
		$this->delete_cookie('KEYUSER');
		$this->disable_cache();	
	}
	
	/* function to sae the test completion time */
	public function save_test_complete($test, $status, $time){
		$this->loadModel('Register');
		$this->Register->id = $this->Session->read('USER.Register.id');
		$this->Register->saveField('test'.$test.'_complete', $time);
		$this->Register->saveField('test'.$test.'_status', $status);
	}
	
}
