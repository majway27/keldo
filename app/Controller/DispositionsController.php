<?php
App::uses('AppController', 'Controller');
/**
 * Dispositions Controller
 *
 * @property Disposition $Disposition
 * @property PaginatorComponent $Paginator
 */
class DispositionsController extends AppController {

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
		$this->Disposition->recursive = 0;
		$this->set('dispositions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Disposition->exists($id)) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		$options = array('conditions' => array('Disposition.' . $this->Disposition->primaryKey => $id));
		$this->set('disposition', $this->Disposition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Disposition->create();
			if ($this->Disposition->save($this->request->data)) {
				$this->Session->setFlash(__('The disposition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disposition could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Disposition->exists($id)) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Disposition->save($this->request->data)) {
				$this->Session->setFlash(__('The disposition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disposition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Disposition.' . $this->Disposition->primaryKey => $id));
			$this->request->data = $this->Disposition->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Disposition->id = $id;
		if (!$this->Disposition->exists()) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Disposition->delete()) {
			$this->Session->setFlash(__('The disposition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The disposition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Disposition->recursive = 0;
		$this->set('dispositions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Disposition->exists($id)) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		$options = array('conditions' => array('Disposition.' . $this->Disposition->primaryKey => $id));
		$this->set('disposition', $this->Disposition->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Disposition->create();
			if ($this->Disposition->save($this->request->data)) {
				$this->Session->setFlash(__('The disposition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disposition could not be saved. Please, try again.'));
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
		if (!$this->Disposition->exists($id)) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Disposition->save($this->request->data)) {
				$this->Session->setFlash(__('The disposition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disposition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Disposition.' . $this->Disposition->primaryKey => $id));
			$this->request->data = $this->Disposition->find('first', $options);
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
		$this->Disposition->id = $id;
		if (!$this->Disposition->exists()) {
			throw new NotFoundException(__('Invalid disposition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Disposition->delete()) {
			$this->Session->setFlash(__('The disposition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The disposition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
