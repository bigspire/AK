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
  
class HomeController extends AppController {  
	
	public $name = 'Home';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions','Excel');

	public function index(){
		if($this->request->is('post')){
				// for excel
				$this->Home->set($this->request->data);
				if(!empty($this->request->data['Home']['hdnExcel'])){
					$status = true;
					$data = $this->Home->find('all', array('fields' => array('mobile','first_name', 'emp_code', 'last_name','email_id','id','status',
					'last_login'),'conditions' =>array('is_deleted' => 'N', 'status' => '1'), 'group' => array('Home.id')));
					$this->request->data['Home']['hdnData'] = '';
				}
				// for individual report
				else if($this->Home->validates(array('fieldList' => array('mobile')))){				
					$data = $this->Home->find('all', array('fields' => array('mobile','first_name', 'emp_code', 'last_name','email_id','id','status',
					'last_login','created_date'),'conditions' =>array('mobile' => $this->request->data['Home']['mobile'],
					'is_deleted' => 'N', 'status' => '1')));
					if(!empty($data[0]['Home']['id'])){ 
						$status = true;
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Mobile!', 'default', array('class' => 'alert alert-danger'));	
					}
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-danger'));	
				}					
				// when success login attempt
				if($status){
					foreach($data as $user_data){
						$user_cond = array('registration_id' => $user_data['Home']['id']);
						// get personal results
						$this->loadModel('TestResult');
						$options = array(
							array('table' => 'personal_questions',
								  'alias' => 'TestQuestion',					
								  'type' => 'LEFT',
								  'conditions' => array('`TestResult`.personal_questions_id` = `TestQuestion`.`id`')
							),
							array('table' => 'personal_options',
								  'alias' => 'TestOption',					
								  'type' => 'LEFT',
								  'conditions' => array('`TestOption`.personal_questions_id` = `TestQuestion`.`id`',
								  '`TestOption`.id` = `TestResult`.`personal_options_id`')
							),
							array('table' => 'chapters',
								  'alias' => 'Chapter',					
								  'type' => 'LEFT',
								  'conditions' => array('`Chapter`.id` = `TestQuestion`.`chapters_id`')
							)
						);
						
						$test_data = $this->TestResult->find('all', array('conditions' => array($user_cond),
						'fields' => array('TestResult.personal_questions_id','TestResult.personal_options_id','TestOption.score',
						'Chapter.chapter_name','Chapter.chapter_code'), 'order' => array('Chapter.id' => 'asc'),
						'group' => array('TestResult.id'), 'joins' => $options));	
							$sm_score = '';
							$ment_score = '';
							$dm_score = '';
							$ps_score = '';
							$disc_score = '';
							$tm_score = '';
							$la_score = '';
							$ctw_score = '';
							$ipr_score = '';
							
							
						if(count($test_data) > 0){
							// get score chapter wise
							foreach($test_data as $result){								
								switch($result['Chapter']['chapter_code']){
									case 'SM': 
									$sm_score += $result['TestOption']['score'];								
									break;
									case 'MENT':
									$ment_score += $result['TestOption']['score'];
									break;
									case 'DM':
									$dm_score += $result['TestOption']['score'];
									break;
									case 'PS':
									$ps_score += $result['TestOption']['score'];
									break;
									case 'DISC':
									$disc_score += $result['TestOption']['score'];
									break;
									case 'TM':
									$tm_score += $result['TestOption']['score'];
									break;
									case 'LA':
									$la_score += $result['TestOption']['score'];
									break;
									case 'CTW':
									$ctw_score += $result['TestOption']['score'];
									break;
									case 'IPR':
									$ipr_score += $result['TestOption']['score'];
									break;								
								}
								$chapter_list[] = $result['Chapter']['chapter_name'];
							} 
							$score = array();
							
							
							$score[] = $sm_score;
							$score[] = $ment_score;
							$score[] = $dm_score;
							$score[] = $ps_score;
							$score[] = $disc_score;
							$score[] = $tm_score;
							$score[] = $la_score;
							$score[] = $ctw_score;
							$score[] = $ipr_score;
							
							// $score = array(); // ravi added now
							
							$chapter_unique = array_unique($chapter_list);
							$this->set('chapter_graph', array('Stress Management','Mentoring','Decision Making','Problem Solving',
							'Discipline', 'Time Management','Learning Agility','Commitment to Work','Interpersonal Relationship'));
							$this->set('colors', array('#b87333', '#ff0000','#446dc4','#efa0a0','#b5f495','#9dbff2','#f9b3f6','#93f2eb','#f2ca52'));

							
							// get the situation scores
							$options = array(
								array('table' => 'situation_question_options',
									  'alias' => 'SituationOption',					
									  'type' => 'LEFT',
									  'conditions' => array('`SituationOption`.id` = `TestResult2`.`situation_question_options_id`')
								),							
								array('table' => 'situation_question',
									  'alias' => 'SituationQuestion',					
									  'type' => 'LEFT',
									  'conditions' => array('`SituationOption`.situation_question_id` = `SituationQuestion`.`id`')
								),							
								array('table' => 'situation_question_chapter',
									  'alias' => 'SituationChapter',					
									  'type' => 'LEFT',
									  'conditions' => array('`SituationChapter`.situation_question_id` = `SituationQuestion`.`id`')
								),
								array('table' => 'chapters',
									  'alias' => 'Chapter',					
									  'type' => 'LEFT',
									  'conditions' => array('`Chapter`.id` = `SituationChapter`.`chapters_id`')
								),
							);
							$this->loadModel('TestResult2');
							$test2_data = $this->TestResult2->find('all', array('fields' => array('SituationOption.rank as default_rank',
							'TestResult2.rank as user_rank', 'group_concat(Chapter.chapter_code) situation_chapter'),
							'conditions' => array($user_cond),
							'group' => array('TestResult2.id'),'joins' => $options));
							
							$sm_score2 = '';
							$ment_score2 = '';
							$dm_score2 = '';
							$ps_score2 = '';
							$disc_score2 = '';
							$tm_score2 = '';
							$la_score2 = '';
							$ctw_score2 = '';
							$ipr_score2 = '';
							
							foreach($test2_data as $result2){ 
							// echo $result2['SituationOption']['default_rank']; echo '-';
							// echo $result2['TestResult2']['user_rank']; echo '<br>';
								$sit_chapter = explode(',', $result2[0]['situation_chapter']);
								foreach($sit_chapter as $chap){ 
									switch($chap){ 
										case 'SM': 
										$sm_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);									
										break;
										case 'MENT':
										$ment_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'DM':
										$dm_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'PS':
										$ps_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'DISC': 
										$disc_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'TM':
										$tm_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'LA':
										$la_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'CTW':
										$ctw_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;
										case 'IPR':
										$ipr_score2 += $this->get_score($result2['SituationOption']['default_rank'], $result2['TestResult2']['user_rank']);	
										break;	
									}
								}
							}
							
							$score2 = array();
							
							// assign in the array for the display purpose
							$score2[] = $sm_score2;
							$score2[] = $ment_score2;
							$score2[] = $dm_score2;
							$score2[] = $ps_score2;
							$score2[] = $disc_score2;
							$score2[] = $tm_score2;
							$score2[] = $la_score2;
							$score2[] = $ctw_score2;
							$score2[] = $ipr_score2;
							
							
							
							$i = 0;
							$total_group = array();
							foreach($chapter_unique as $c){
								$p_score = $score[$i] ? $score[$i] : 0;
								$s_score = $score2[$i] ? $score2[$i] : 0;
								$total[] = number_format((($p_score+$s_score)/150)*100, 2);
								$total_group[] = number_format((($p_score+$s_score)/150)*100, 2);
								$i++; 
							}
							$total_group2[$user_data['Home']['id']] = $total_group;
							//unset($total_group);
							//unset($score);
							//unset($score2);
							
							
							$this->set('avg_data', $total);
							
							$this->set('graphChart', 'done');
							// export into excel
							
						
							// create the pdf
							if(!empty($this->request->data['Home']['hdnData']) && empty($this->request->data['Home']['hdnExcel'])){
								date_default_timezone_set('Asia/Calcutta');						
								// get the HTML
								ob_start();
								include(WWW_ROOT.'/vendor/html2pdf/examples/res/indiv_template.php');
								$content = ob_get_clean();							
								// convert to PDF
								require_once(WWW_ROOT.'/vendor/html2pdf/vendor/autoload.php');												
								try{
									$html2pdf = new HTML2PDF('P', 'A4', 'fr');
									$html2pdf->pdf->SetDisplayMode('fullpage');
									$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
									$this->request->data['Home']['hdnData'] = '';
									$html2pdf->Output(ucfirst(strtolower($user_data['Home']['first_name'])).' '.ucfirst(strtolower($user_data['Home']['last_name'])).'.pdf', 'D');
									// $root = WWW_ROOT.'home';
									// echo "<script>location.href=$root></script>";
								
								}catch(HTML2PDF_exception $e){
									echo $e;
									exit;
								}
							}
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Report Created Successfully!', 'default', array('class' => 'alert alert-success'));	
							
					 
					}					
				  }
			
							
				   if(!empty($this->request->data['Home']['hdnExcel']) && empty($this->request->data['Home']['hdnData'])){
							$data = $this->Home->find('all', array('fields' => array('Home.id','first_name', 'last_name',
							 'emp_code'),'conditions' => array('Home.is_deleted' => 'N',  'Home.status' => '1'), 
							'order' => array('first_name' => 'asc'), 'group' => array('Home.id')));	
							$this->request->data['Home']['hdnExcel'] = '';
							$this->Excel->generate('group_report_template', $data, $total_group2, 'Report', 'Group Score');
						}
					}
			}
		}
	

	
	/* function to get the score */
	public function get_score($default_rank, $user_rank){
		// check ranks are matching
		$diff = abs($default_rank - $user_rank);
		if($default_rank == $user_rank){
			// if score not matching
			switch($user_rank){
				case '1':
				$score = '5';
				break;
				case '2':
				$score = '4';
				break;
				case '3':
				$score = '3';
				break;
				case '4':
				$score = '2';
				break;
				case '5':
				$score = '1';
				break;
			}
		}
		else if($diff == '1'){
			// if score not matching
			switch($user_rank){
				case '1':
				$score = '2.5';
				break;
				case '2':
				$score = '2';
				break;
				case '3':
				$score = '1.5';
				break;
				case '4':
				$score = '1';
				break;
				case '5':
				$score = '0.5';
				break;
			}			
		}
		return $score;
	}
	
	/* function to validate session */
	public function beforeFilter(){
		$this->check_admin_session();		
	}
	

}