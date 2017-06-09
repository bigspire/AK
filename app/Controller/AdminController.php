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
  
class AdminController extends AppController{  
	
	public $name = 'Admin';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');

	public function login(){
		if($this->request->is('post')){
			// validates the form
			$this->Admin->set($this->request->data);
			if($this->Admin->validates(array('fieldList' => array('email_id','password')))) {				
				$data = $this->Admin->find('first', array('fields' => array('full_name','email_id','id','status',
				'last_login'),'conditions' =>array('email_id' => $this->request->data['Admin']['email_id'],
				'is_deleted' => 'N', 'status' => '1')));
				// when success login attempt
				if(!empty($data['Admin']['id'])){ 
					// check account activated
					if($data['Admin']['status'] == '1'){							
					// write in session
					$this->Session->write('ADMUSER', $data);							
					// set cookie
					$this->set_cookie('KEYADMUSER', $this->Functions->encrypt($this->Admin->id), '30 Days');
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Welcome to Assess Key Admin!', 'default', array('class' => 'alert alert-success'));
					$this->redirect('/home/');					
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Acount Deactivated!...', 'default', array('class' => 'alert alert-danger'));
				}
			}else{
				//print_r($this->Admin->validationErrors);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-danger'));	
				}
			}
		}		
	}
	
	
	
	/* function to clear the session */
	
	public function logout() {	
		$this->Session->destroy();
		$this->delete_cookie('KEYADMUSER');
		$this->disable_cache();		
		$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have successfully signed off', 'default', array('class' => 'alert alert-success'));
		$this->redirect('/admin/login/');

	}
	
	/* function to create cookie */
	public function set_cookie($name, $value, $time){	
		$this->Cookie->write($name, $value, false, $time);

	}
	

}