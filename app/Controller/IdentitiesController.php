<?php
App::uses('AppController', 'Controller');
/**
 * Identities Controller
 *
 * @property Identity $Identity
 * @property PaginatorComponent $Paginator
 */
class IdentitiesController extends AppController {

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
		$this->Identity->recursive = 0;
		$this->set('identities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Identity->exists($id)) {
			throw new NotFoundException(__('Invalid identity'));
		}
		$options = array('conditions' => array('Identity.' . $this->Identity->primaryKey => $id));
		$this->set('identity', $this->Identity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Identity->create();
			if ($this->Identity->save($this->request->data)) {
				$this->Session->setFlash(__('The identity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The identity could not be saved. Please, try again.'));
			}
		}
		$users = $this->Identity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Identity->exists($id)) {
			throw new NotFoundException(__('Invalid identity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Identity->save($this->request->data)) {
				$this->Session->setFlash(__('The identity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The identity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Identity.' . $this->Identity->primaryKey => $id));
			$this->request->data = $this->Identity->find('first', $options);
		}
		$users = $this->Identity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Identity->id = $id;
		if (!$this->Identity->exists()) {
			throw new NotFoundException(__('Invalid identity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Identity->delete()) {
			$this->Session->setFlash(__('The identity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The identity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Identity->recursive = 0;
		$this->set('identities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Identity->exists($id)) {
			throw new NotFoundException(__('Invalid identity'));
		}
		$options = array('conditions' => array('Identity.' . $this->Identity->primaryKey => $id));
		$this->set('identity', $this->Identity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Identity->create();
			if ($this->Identity->save($this->request->data)) {
				$this->Session->setFlash(__('The identity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The identity could not be saved. Please, try again.'));
			}
		}
		$users = $this->Identity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Identity->exists($id)) {
			throw new NotFoundException(__('Invalid identity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Identity->save($this->request->data)) {
				$this->Session->setFlash(__('The identity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The identity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Identity.' . $this->Identity->primaryKey => $id));
			$this->request->data = $this->Identity->find('first', $options);
		}
		$users = $this->Identity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Identity->id = $id;
		if (!$this->Identity->exists()) {
			throw new NotFoundException(__('Invalid identity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Identity->delete()) {
			$this->Session->setFlash(__('The identity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The identity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
