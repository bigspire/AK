<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class Register extends AppModel {
	
	public $name = 'Register';	 
	
	public $useTable = 'registration';
	
	public $validate = array(		
        'first_name' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the first name'
            )
        ),
		'last_name' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the last name'
            )
		)
		,
		'email_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the email id'
            ),
			'valid_mail' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please enter the valid email id'
            )
		),
		'mobile' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the mobile no (10 digits only)'
            ),
			'numeric' => array(
                'rule'     => 'Numeric',
                'required' => true,
                'message'  => 'Please enter only numeric values'
            ),
			'minlength' => array(
				'rule' => array('minLength', 10),
                'required' => true,
                'message'  => 'Please enter 10 digits'
            ),
			'maxlength' => array(
				'rule' => array('maxLength', 10),
                'required' => true,
                'message'  => 'Please enter 10 digits'
            )
		),
		 'otp' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the OTP'
            )
        ),
		'language_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select language to attend the test'
            )
        )
	);
	

	

	
}