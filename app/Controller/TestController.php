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
  
class TestController extends AppController {  
	
	public $name = 'Test';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');

	public function index(){ 
		// when the form submitted
		if($this->request->is('post')){ 
			// save the form
			$this->Test->set($this->request->data);
			$this->request->data['TestResult']['created_date'] = $this->Functions->get_current_date();
			$this->request->data['TestResult']['registration_id'] = $this->Session->read('USER.Register.id');
			// test completion status
			if($this->request->data['Test']['test_complete'] == '1'){
				$this->request->data['TestResult']['is_draft'] = 'N';
			}
			// save the data
			$this->loadModel('TestResult');
			$i = 1;
			foreach($this->request->data as $data){
				// when the data is not empty
				if(trim($data) != ''){
					$values = explode('-', $data);
					$this->request->data['TestResult']['personal_questions_id'] = $values[0]; 
					$this->request->data['TestResult']['personal_options_id'] = $values[1];	
					// check record exists or not
					$qn_ans = $this->check_question_already($values[0]);
					// save the test result if not answered
					if($qn_ans){
						$this->TestResult->id = $qn_ans;
					}else{
						$this->TestResult->create();
					}
					$this->TestResult->save($this->request->data['TestResult']);
				}				
			}
			// update other questions also
			if($this->request->data['Test']['test_complete'] == '1'){
				$this->update_test_completion();				
			}
			// when the test is complete
			if($this->request->data['Test']['test_complete'] == '1'){
				// show the msg.
				$this->complete_test();
			}
		}
		
		// get the answers of the user
		$this->loadModel('TestResult');
		$data = $this->TestResult->find('all', array('fields' => array('personal_questions_id','personal_options_id'), 'conditions' => array('registration_id' => 
		$this->Session->read('USER.Register.id'), 'is_draft' => 'Y')));
		$this->set('option_result', $data);
		$this->set('total_answered', count($data));
		
		// find the remaining time
		$remain = $this->Functions->time_diff($this->Session->read('USER.Register.test1_complete'), date('H:i:s'));
		$split_time = explode('-', $remain);
		$min = $split_time[0];
		$sec = $split_time[1];
		$remaining_minute = 44 - $min;
		$this->set('remain_time', $remaining_minute);
		$this->set('remain_sec', 60 - $sec);
		if($remaining_minute < 0){		
			$this->update_test_completion();				
			$this->complete_test();
		}
		
		
		// get all the questions
		$limit = 10;
		$format = 'RAND(%d)';
		$rand = sprintf($format, $this->Session->read('USER.Register.otp'));
		$seed = $this->Test->get_random_no($rand);
		// set utf8 char. set for regional language
		$this->Test->set_chartacter_set();		
		// set group concat max. length
		$this->Test->set_group_concat();
		$this->paginate = array('fields' => array('Test.id','Test.question',"group_concat(Option.option_name ORDER BY Option.id ASC SEPARATOR '|'  ) options",
		"group_concat(Option.id) options_id","group_concat(Option.score) score"), 'limit' => $limit,'conditions' => array('Test.is_deleted'  => 'N',
		'Test.status' => '1','Test.language_id' => $this->Session->read('USER.Register.language_id')),'order' => "rand($seed)", 'group' => array('Test.id'), 'joins' => $options);			
		$data = $this->paginate('Test');
		$this->set('test_data', $data);
		// page limit set
		$this->set('limit', $limit);
		// check instruction is read
		if($this->Session->read('USER.Register.ins_read_t1') == ''){
			if($this->request->params['named']['ins'] == 'read'){
				$this->Session->write('USER.Register.ins_read_t1', 1);
			}
		}
		if($this->Session->read('USER.Register.ins_read_t2') == ''){
			if($this->request->params['named']['ins2'] == 'read'){
				$this->Session->write('USER.Register.ins_read_t2', 1);
			}
		}
		
	}
	
	/* when the test time got over */
	public function timeout(){
		$this->loadModel('TestResult');
		$this->update_test_completion();				
		$this->complete_test();
	}
	
	/* function to complete test1 */
	public function complete_test(){
		$this->Session->write('USER.Register.test1', 'complete');
		$time = date('H:i:s');
		// save test 1 completion time
		$this->save_test_complete('1', '1', $time);
		if($this->Session->read('USER.Register.test2_complete') == ''){
			$this->save_test_complete('2', '0', $time);
			$this->Session->write('USER.Register.test2_complete', $time);
		}
		/*
		else{
			// $this->Session->write('USER.Register.test2_complete', $time);
		}*/
		$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>TEST 1 completed successfully!. Take TEST 2 now. ALL THE BEST!', 'default', array('class' => 'alert alert-success'));
		$this->redirect('/test2/');
	}
	
	/* function to update the test completion */
	public function update_test_completion(){
		$this->TestResult->updateAll(
				array('TestResult.is_draft' => "'N'"),
				array('TestResult.registration_id' => $this->Session->read('USER.Register.id'))
					);
	}
	
	/* function to check question already answered */
	public function check_question_already($qn_id){ 
		$this->loadModel('TestResult');
		$data = $this->TestResult->find('first', array('conditions' => array('registration_id' => $this->Session->read('USER.Register.id'),
		'personal_questions_id' => $qn_id, 'is_draft' => 'Y'), 'fields' => array('TestResult.id')));
		return $data['TestResult']['id'];
	}
	
	
	/* function to validate session */
	public function beforeFilter(){
		$this->check_session();
		// restrict test1 if already completed
		if($this->Session->read('USER.Register.test1') == 'complete'){ 
			$this->redirect('/test2/');
		}	
		/*
		// old logic
		$options = array(
				array('table' => 'personal_results',
					  'alias' => 'TestResult',					
					  'type' => 'LEFT',
					  'conditions' => array('`TestResult`.personal_questions_id` = `Test`.`id`' and 
											'TestResult`.registration_id' => $this->Session->read('USER.Register.id'))
				),
				array('table' => 'personal_results',
					  'alias' => 'TestResult2',					
					  'type' => 'LEFT',
					  'conditions' => array('`TestResult2`.registration_id` = `Test`.`id`')
				),
				array('table' => 'registration',
					  'alias' => 'Registration',					
					  'type' => 'LEFT',
					  'conditions' => array('`Registration`.id` = `TestResult2`.registration_id`')
				)
			);
			// check test 1 completed
			$data = $this->Test->find('first', array('conditions' => array('online_tests_id' => '1',
			'TestResult.is_draft' => 'N'),'fields' => array('Registration.test2_complete'),'joins' => $options));
			if(!empty($data)){
				$this->Session->write('USER.Register.test1', 'complete');
				$this->Session->write('USER.Register.test2_complete', $data['Registration']['test2_complete']);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Test1 completed successfully!. Take Test2 now. ALL THE BEST!', 'default', array('class' => 'alert alert-success'));
				$this->redirect('/test2/');
			}
		}
		*/
		
	}
	
	

}