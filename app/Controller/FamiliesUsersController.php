<?php
App::uses('AppController', 'Controller');
/**
 * FamiliesUsers Controller
 *
 * @property FamiliesUser $FamiliesUser
 * @property PaginatorComponent $Paginator
 */
class FamiliesUsersController extends AppController {

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
		$this->FamiliesUser->recursive = 0;
		$this->set('familiesUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FamiliesUser->exists($id)) {
			throw new NotFoundException(__('Invalid families user'));
		}
		$options = array('conditions' => array('FamiliesUser.' . $this->FamiliesUser->primaryKey => $id));
		$this->set('familiesUser', $this->FamiliesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FamiliesUser->create();
			if ($this->FamiliesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The families user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The families user could not be saved. Please, try again.'));
			}
		}
		$families = $this->FamiliesUser->Family->find('list');
		$users = $this->FamiliesUser->User->find('list');
		$this->set(compact('families', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FamiliesUser->exists($id)) {
			throw new NotFoundException(__('Invalid families user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FamiliesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The families user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The families user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FamiliesUser.' . $this->FamiliesUser->primaryKey => $id));
			$this->request->data = $this->FamiliesUser->find('first', $options);
		}
		$families = $this->FamiliesUser->Family->find('list');
		$users = $this->FamiliesUser->User->find('list');
		$this->set(compact('families', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FamiliesUser->id = $id;
		if (!$this->FamiliesUser->exists()) {
			throw new NotFoundException(__('Invalid families user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FamiliesUser->delete()) {
			$this->Session->setFlash(__('The families user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The families user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FamiliesUser->recursive = 0;
		$this->set('familiesUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FamiliesUser->exists($id)) {
			throw new NotFoundException(__('Invalid families user'));
		}
		$options = array('conditions' => array('FamiliesUser.' . $this->FamiliesUser->primaryKey => $id));
		$this->set('familiesUser', $this->FamiliesUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FamiliesUser->create();
			if ($this->FamiliesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The families user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The families user could not be saved. Please, try again.'));
			}
		}
		$families = $this->FamiliesUser->Family->find('list');
		$users = $this->FamiliesUser->User->find('list');
		$this->set(compact('families', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FamiliesUser->exists($id)) {
			throw new NotFoundException(__('Invalid families user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FamiliesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The families user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The families user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FamiliesUser.' . $this->FamiliesUser->primaryKey => $id));
			$this->request->data = $this->FamiliesUser->find('first', $options);
		}
		$families = $this->FamiliesUser->Family->find('list');
		$users = $this->FamiliesUser->User->find('list');
		$this->set(compact('families', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FamiliesUser->id = $id;
		if (!$this->FamiliesUser->exists()) {
			throw new NotFoundException(__('Invalid families user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FamiliesUser->delete()) {
			$this->Session->setFlash(__('The families user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The families user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
