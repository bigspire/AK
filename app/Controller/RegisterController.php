<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
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
 */
 
 
App::uses('Sanitize', 'Utility');   
  
class RegisterController extends AppController {  
	
	public $name = 'Register';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');

	public function index(){ 
		// set the language lists
		$this->loadModel('Language');
		$list = $this->Language->find('list', array('fields' => array('id','language'),
		'order' => array('id ASC')));
		$this->set('language_list', $list);		
		if($this->request->is('post')){ 
			if ($this->request->is('post')){ 
				// validates the form
				$this->Register->set($this->request->data);
				if($this->Register->validates(array('fieldList' => array('first_name',
				'last_name','email_id','mobile','language_id')))) {
					$this->request->data['Register']['created_by'] = $this->Session->read('USER.Login.id');				
					$this->request->data['Register']['created_date'] = $this->Functions->get_current_date();
					$this->request->data['Register']['otp'] = $this->Functions->get_random_otp();	
					// check user already exists
					$user_id = $this->check_user_exist($this->request->data['Register']['mobile']);
					if(!empty($user_id)){
						$user = explode('-', $user_id);
						$this->request->data['Register']['id'] = $user[0];
					}
					// if user already completed the test, redirect to thank you page
					if($user[3] == '1' && $user[4] == '1'){
						$this->redirect('/register/test_complete/action:donebefore');
					}
					// save the data
					if($this->Register->save($this->request->data['Register'])) {	
						$sms = $this->request->data['Register']['otp'].' is your OTP for the online test in AssessKey. OTP is valid for 5 mins only.';
						// send otp
						if($this->Functions->send_sms($this->request->data['Register']['mobile'],$sms,$this->request->data['Register']['otp'])){
							// write in session
							$this->request->data['Register']['id'] = $this->Register->id;
							$this->Session->write('USER', $this->request->data);
							// if user already logs in
							if(!empty($user[1])){
								$this->Session->write('USER.Register.test1_complete', $user[1]);
								$this->Session->write('USER.Register.test1', $user[3] ? 'complete' : '');
							}
							// if user already logs in
							if(!empty($user[2])){
								$this->Session->write('USER.Register.test2_complete', $user[2]);
								$this->Session->write('USER.Register.test2', $user[4] ? 'complete' : '');
							}
							// set cookie
							$this->set_cookie('KEYUSER', $this->Functions->encrypt($this->Register->id), '30 Days');
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>OTP sent successfully', 'default', array('class' => 'alert alert-success'));
							$this->redirect('/register/process_otp/');
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending OTP...', 'default', array('class' => 'alert alert-danger'));	
						}
					
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in creating the account...', 'default', array('class' => 'alert alert-danger'));
					}
				}else{
					//print_r($this->Register->validationErrors);
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-danger'));	
				}
			}
		}
		
	}
	
	/* function to show when the test completed */
	public function test_complete(){
		
	}
	
	/* function to check the user already exists */
	public function check_user_exist($mobile){
		$data = $this->Register->find('first', array('fields' => array('id','test1_complete','test2_complete','test1_status','test2_status'),
		'conditions' => array('Register.mobile' => $mobile, 'is_deleted' => 'N', 'status' => '1')));					
		if(!empty($data)){
			return $data['Register']['id'].'-'.$data['Register']['test1_complete'].'-'.$data['Register']['test2_complete'].'-'.$data['Register']['test1_status'].'-'.$data['Register']['test2_status'];;
		}
	}
	
	/* function to process the otp */
	public function process_otp(){
		// check user registered
		$this->check_session();
		if($this->request->is('post')){ 
			if ($this->request->is('post')){ 
				// validates the form
				$this->Register->set($this->request->data);
				$this->Session->read('USER.Register.otp');
				if($this->Register->validates(array('fieldList' => array('otp')))){
					// validate the OTP
					if($this->Session->read('USER.Register.otp') == $this->request->data['Register']['otp']){
						$this->request->data['Register']['id'] = $this->Session->read('USER.Register.id');
						$this->request->data['Register']['otp_status'] = 1;				
						// save the data
						if($this->Register->save($this->request->data['Register'], array('validate' => false))){
							// show the msg.
							unset($this->request->data['Register']['otp']);
							// if time not updated save test 1 completion time
							$time = date('H:i:s');
							if($this->Session->read('USER.Register.test1_complete') == ''){
								$this->Session->write('USER.Register.test1_complete', $time);
								$this->save_test_complete('1', '0', $time);
							}
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Registration completed successfully! You can start your TEST 1 now! ALL THE BEST!', 'default', array('class' => 'alert alert-success'));
							$this->redirect('/test/');
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in creating the account...', 'default', array('class' => 'alert alert-danger'));
						}
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid OTP!', 'default', array('class' => 'alert alert-danger'));	
						unset($this->request->data['Register']['otp']);
					}
				}else{
					//print_r($this->Register->validationErrors);
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in processing.. please check errors...', 'default', array('class' => 'alert alert-danger'));	
				}
			}
		}
		
	}
	
	/* function to clear the session */
	
	public function logout() {	
		$this->Session->destroy();
		$this->delete_cookie('KEYUSER');
		$this->disable_cache();		
		$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have successfully signed off', 'default', array('class' => 'alert alert-success'));
		$this->redirect('/register/');

	}
	
	/* function to create cookie */
	public function set_cookie($name, $value, $time){	
		$this->Cookie->write($name, $value, false, $time);

	}
	
	/* function to update time */
	public function update_time(){
		$this->Register->id = $this->Session->read('USER.Register.id');
		$this->Register->saveField('test_time', date('H:i:s'));
	}

}