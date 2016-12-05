<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
	
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'problems', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'sites', 'action' => 'splash'),
					'authorize' => array('Controller')
			)
	);
	
	public function isAuthorized($user) {
		// Admin can access every action
	#	if (isset($user['role']) && $user['role'] === 'admin') {
	#		return true;
	#	}
	
	#	// Default deny
	#	return false;
		
		//Testing
		return true;
	}
	
	public function beforeFilter() {
		$this->Auth->allow('splash', 'help');
		
		$role = $this->Auth->user('Role.name');
		
		if ($role == 'Author' || $role == 'Tester' || $role == 'Admin') {
			$this->set('role', $role);
		}
		
		if($role == 'Admin') {
			$this->set('is_admin', true);
		}
		else {
			$this->set('is_admin', false);
		}
	}
	
	public function help() {
		$loggedinuser = $this->Auth->User('username');
		$this->set(compact('loggedinuser'));
	}
}
