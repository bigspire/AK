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

class Admin extends AppModel {
	
	public $name = 'Admin';	 
	
	public $useTable = 'admin_users';
	
	public $validate = array(		
        'email_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the email address'
            ),
			'valid_mail' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please enter the valid email address'
            )
        ),
		'password' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the password'
            )
		)
		
	);
	

	

	
}