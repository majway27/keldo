<?php
App::uses('AppController', 'Controller');

/**
 * Problems Controller
 *
 * @property Problem $Problem
 * @property PaginatorComponent $Paginator
 */
class ProblemsController extends AppController {

	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}
	
		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$problemId = $this->request->params['pass'][0];
			if ($this->Problem->isOwnedBy($problemId, $user['id'])) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
/**
 * index method
 *
 * @return void
 */
	public function all() {
		$this->Problem->recursive = 0;
		$this->set('problems', $this->Paginator->paginate());
		$loggedinuser = $this->Auth->User('username');
		$this->set(compact('loggedinuser'));
	}

	public function index() {
		$loggedinuser = $this->Auth->User('username');
		$userid = $this->Auth->User('id');
		$this->loadModel('Message');
		$messages = $this->Message->find('all');
		#$this->set('messages');
		$allMyProblems = $this->Problem->find('all', array('conditions' => array('Problem.user_id =' => $userid)));
		$this->set(compact('loggedinuser','allMyProblems','messages'));
	}
	
	public function testhome() {
		$loggedinuser = $this->Auth->User('username');
		$userid = $this->Auth->User('id');
		$this->loadModel('Message');
		$messages = $this->Message->find('all');
		#$this->set('messages');
		$allMyProblems = $this->Problem->find('all', array('conditions' => array('Problem.user_id =' => $userid)));
		$this->set(compact('loggedinuser','allMyProblems','messages'));
	}
		
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	#public function view($id = null) {
	#	if (!$this->Problem->exists($id)) {
	#		throw new NotFoundException(__('Invalid problem'));
	#	}
	#	$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
	#	$this->set('problem', $this->Problem->find('first', $options));
	#	$users = $this->Problem->User->find('list');
	#	$families = $this->Problem->Family->find('list');
	#	$this->set(compact('dispositions','users','families'));	
	#}

	public function view($arg4) {
		if (!$this->Problem->exists($arg4)) {
			throw new NotFoundException(__('Invalid problem'));
			}
			$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $arg4));
			$users = $this->Problem->User->find('list');
			$families = $this->Problem->Family->find('list');
			$this->Paginator->settings = array('conditions' => array('Solution.problem_id' => $arg4),'order' => array('Solution.name' => 'asc'));
			$solutions = $this->Paginator->paginate('Solution');
			$this->set('problem', $this->Problem->find('first', $options));
			$this->set(compact('dispositions','users','families','solutions'));
		}
		
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Problem->create();
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		}
		$dispositions = $this->Problem->Disposition->find('list');
		$users = $this->Problem->User->find('list');
		$families = $this->Problem->Family->find('list');
		$this->set(compact('dispositions','users','families'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Problem->exists($id)) {
			throw new NotFoundException(__('Invalid problem'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
			$this->request->data = $this->Problem->find('first', $options);
		}
		$dispositions = $this->Problem->Disposition->find('list');
		$users = $this->Problem->User->find('list');
		$families = $this->Problem->Family->find('list');
		$this->set(compact('dispositions','users','families'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Problem->delete()) {
			$this->Session->setFlash(__('The problem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Problem->recursive = 0;
		$this->set('problems', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Problem->exists($id)) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
		$this->set('problem', $this->Problem->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Problem->create();
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Problem->exists($id)) {
			throw new NotFoundException(__('Invalid problem'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
			$this->request->data = $this->Problem->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Problem->delete()) {
			$this->Session->setFlash(__('The problem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
