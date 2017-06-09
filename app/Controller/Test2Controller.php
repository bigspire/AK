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
  
class Test2Controller extends AppController {  
	
	public $name = 'Test2';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');

	public function index(){
		if($this->request->is('post')){ 
			$this->request->data['TestResult2']['registration_id'] = $this->Session->read('USER.Register.id');				
			$this->request->data['TestResult2']['created_date'] = $this->Functions->get_current_date();
			// test completion status
			if($this->request->data['Test2']['test_complete'] == '1'){
					$this->request->data['TestResult2']['is_draft'] = 'N';
			}
			// save the data
			$this->loadModel('TestResult2');
			$i = 1;
			foreach($this->request->data['rankReal'] as $data){
				// when the data is not empty
				if(trim($data) != ''){
					$values = explode('_', $data);
					$this->request->data['TestResult2']['situation_question_id'] = $values[0]; 
					$this->request->data['TestResult2']['situation_question_options_id'] = $values[1];
					$this->request->data['TestResult2']['rank'] = $values[2];	
					// check record exists or not
					$qn_ans = $this->check_question_already($values[0],$values[1]);
					// save the test result if not answered
					if($qn_ans){
						$this->TestResult2->id = $qn_ans;
					}else{
						$this->TestResult2->create();
					}
					$this->TestResult2->save($this->request->data['TestResult2']);
				}				
			}
			// update other questions also
			if($this->request->data['Test2']['test_complete'] == '1'){
				$this->update_test_completion();			
			}
			// when the test is complete
			if($this->request->data['Test2']['test_complete'] == '1'){
				// show the msg.
				$this->complete_test();
			}
		}
		
		// if test 2 time not started
		if($this->Session->read('USER.Register.test2_complete') != ''){
			// set utf8 char. set for regional language
			$this->Test2->set_chartacter_set();
			// set group concat max. length
			$this->Test2->set_group_concat();		
			// get the answers of the user
			$this->loadModel('TestResult2');
			$data = $this->TestResult2->find('all', array('fields' => array('situation_question_id','situation_question_options_id','rank'), 
			'conditions' => array('registration_id' => 	$this->Session->read('USER.Register.id'),'is_draft' => 'Y')));
			$this->set('option_result', $data);
			// iterate the options for retaining vlue
			foreach($data as $optn){
				$optn_data[$optn['TestResult2']['situation_question_options_id']] = $optn['TestResult2']['rank'];
				$qn_data[] = $optn['TestResult2']['situation_question_id'];
			}
			$this->set('optResult', $optn_data);
			$this->set('total_answered', count(array_unique($qn_data)));
			
			// find the remaining time
			$remain = $this->Functions->time_diff($this->Session->read('USER.Register.test2_complete'), date('H:i:s'));
			$split_time = explode('-', $remain);
			$min = $split_time[0];
			$sec = $split_time[1];
			$remaining_minute = 59 - $min;
			$this->set('remain_time', $remaining_minute);
			$this->set('remain_sec', 60 - $sec);
			if($remaining_minute < 0){			
				$this->update_test_completion();				
				$this->complete_test();
			}
			
			// get all the questions
			$format = 'RAND(%d)';
			$rand = sprintf($format, $this->Session->read('USER.Register.otp'));
			$seed = $this->Test2->get_random_no($rand);
			
			// $this->Session->write('USER.Register.language_id', 3);
			$this->paginate = array('fields' => array('Test2.id','Test2.situation',"group_concat(SituationQuestion.question SEPARATOR '|') questions",
			"group_concat(SituationQuestion.rank1_text) rank1_text", "group_concat(SituationQuestion.rank2_text) rank2_text","group_concat(SituationQuestion.id) qn_id"), 'limit' => 1,'conditions' => array('Test2.is_deleted'  => 'N','SituationQuestion.is_deleted'  => 'N', 
			'SituationQuestion.status'  => '1','Test2.status' => '1','Test2.language_id' => $this->Session->read('USER.Register.language_id')),'order' => "rand($seed)", 'group' => array('Test2.id'), 'joins' => $options);			
			$data = $this->paginate('Test2');
			$this->set('test_data', $data);
			// fetch the options of the questions
			$options = array(
				array('table' => 'situation_question_options',
					  'alias' => 'SituationOption',					
					  'type' => 'LEFT',
					  'conditions' => array('`SituationOption`.situation_question_id` = `SituationQuestion`.`id`' )
				)
			);
			// "group_concat(distinct SituationOption.option_name) options", "group_concat(distinct SituationOption.id) op_ids"
			foreach($data as $question){
				$qid = explode(',', $question[0]['qn_id']);
				// fetch all the options of the questions
				foreach($qid as $q){ 
					$data = $this->Test2->SituationQuestion->find('all', array('fields' => array("group_concat(SituationOption.option_name SEPARATOR '|') option_name",
					"group_concat(distinct SituationOption.id) op_ids"),'conditions' => array('SituationOption.situation_question_id' => $q, 'SituationOption.is_deleted' => 'N',
					'SituationOption.status' => '1'),
					'group' => array('SituationQuestion.id'), 'joins' => $options));	
					foreach($data as $opt){
						$option_data['opt_name'][] = $opt[0]['option_name'];
						$option_data['opt_id'][] = $opt[0]['op_ids'];
					}				
				}			
			}
			// echo '<pre>'; print_r($option_data);
			$this->set('option_data', $option_data);
			
			// check instruction is read
			if($this->Session->read('USER.Register.ins_read_t3') == ''){
				if($this->request->params['named']['ins3'] == 'read'){
					$this->Session->write('USER.Register.ins_read_t3', 1);
				}
			}
		}else{
			$this->redirect('/test/');
		}
		
	}
	
	/* function to complete test1 */
	public function complete_test(){
		// save test 1 completion time
		$time = date('H:i:s');
		$this->save_test_complete('2', '1', $time);
		// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Test2 completed successfully!. ', 'default', array('class' => 'alert alert-success'));		
		$this->clear_history();
		$this->redirect('/register/test_complete/');
	}
	
	/* function to update the test completion */
	public function update_test_completion(){
		$this->TestResult2->updateAll(
					array('TestResult2.is_draft' => "'N'"),
					array('TestResult2.registration_id' => $this->Session->read('USER.Register.id'))
					);
	}
	
	
	/* when the test time got over */
	public function timeout(){
		$this->loadModel('TestResult2');
		$this->update_test_completion();				
		$this->complete_test();
	}
	
	/* function to check question already answered */
	public function check_question_already($qn_id,$op_id){
		$data = $this->TestResult2->find('first', array('conditions' => array('registration_id' => $this->Session->read('USER.Register.id'),
		'situation_question_id' => $qn_id, 'situation_question_options_id' => $op_id, 'is_draft' => 'Y'), 'fields' => array('TestResult2.id')));
		return $data['TestResult2']['id'];
	}
	
	
	
	/* function to validate session */
	public function beforeFilter(){
		$this->check_session(); 
		// restrict test1 if already completed
		if($this->Session->read('USER.Register.test2') == 'complete'){
			$this->redirect('/register/test_complete/');
		}
			
	}


}