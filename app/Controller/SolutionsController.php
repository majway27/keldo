<?php
App::uses('AppController', 'Controller');
/**
 * Solutions Controller
 *
 * @property Solution $Solution
 * @property PaginatorComponent $Paginator
 */
class SolutionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Solution->recursive = 0;
		$this->set('solutions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Solution->exists($id)) {
			throw new NotFoundException(__('Invalid solution'));
		}
		$options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
		$this->set('solution', $this->Solution->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Solution->create();
			if ($this->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('The solution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
			}
		}
		$problems = $this->Solution->Problem->find('list');
		$dispositions = $this->Solution->Disposition->find('list');
		$users = $this->Solution->User->find('list');
		$this->set(compact('problems', 'dispositions', 'users'));
	}
	
	public function add2prob($arg4) {
		if ($this->request->is('post')) {
			$this->Solution->create();
			if ($this->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('The solution has been saved.'));
				return $this->redirect(array('controller' => 'problems', 'action' => 'view', $arg4));
			} else {
				$this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
			}
		}
		$problems = $this->Solution->Problem->find('list', array('conditions' => array('Problem.id =' => $arg4)));
		$dispositions = $this->Solution->Disposition->find('list', array('conditions' => array('Disposition.name =' => 'Active')));
		$userid = $this->Auth->User('id');
		$users = $this->Solution->User->find('list', array('conditions' => array('User.id =' => $userid)));
		$this->set(compact('problems', 'dispositions', 'users'));
		#debug(func_get_args());
		print_r(get_defined_vars());
		#Debugger::dump($this->data);
		#print_r($this->request->data);
		#debug($this->request->data);
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Solution->exists($id)) {
			throw new NotFoundException(__('Invalid solution'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('The solution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
			$this->request->data = $this->Solution->find('first', $options);
		}
		$problems = $this->Solution->Problem->find('list');
		$dispositions = $this->Solution->Disposition->find('list');
		$users = $this->Solution->User->find('list');
		$this->set(compact('problems', 'dispositions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Solution->id = $id;
		if (!$this->Solution->exists()) {
			throw new NotFoundException(__('Invalid solution'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solution->delete()) {
			$this->Session->setFlash(__('The solution has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Solution->recursive = 0;
		$this->set('solutions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Solution->exists($id)) {
			throw new NotFoundException(__('Invalid solution'));
		}
		$options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
		$this->set('solution', $this->Solution->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Solution->create();
			if ($this->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('The solution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
			}
		}
		$problems = $this->Solution->Problem->find('list');
		$dispositions = $this->Solution->Disposition->find('list');
		$users = $this->Solution->User->find('list');
		$this->set(compact('problems', 'dispositions', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Solution->exists($id)) {
			throw new NotFoundException(__('Invalid solution'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('The solution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
			$this->request->data = $this->Solution->find('first', $options);
		}
		$problems = $this->Solution->Problem->find('list');
		$dispositions = $this->Solution->Disposition->find('list');
		$users = $this->Solution->User->find('list');
		$this->set(compact('problems', 'dispositions', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Solution->id = $id;
		if (!$this->Solution->exists()) {
			throw new NotFoundException(__('Invalid solution'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solution->delete()) {
			$this->Session->setFlash(__('The solution has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
