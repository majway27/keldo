<?php
App::uses('AppController', 'Controller');
/**
 * Families Controller
 *
 * @property Family $Family
 * @property PaginatorComponent $Paginator
 */
class FamiliesController extends AppController {

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
	#public function all() {
	#	$this->Family->recursive = 0;
	#	$this->set('families', $this->Paginator->paginate());
	#}
	
	public function all() {
		$this->Paginator->settings = array('conditions' => array('Family.disposition_id' => '2'),'limit' => 12,'order' => array('Family.name' => 'asc'));
		$families = $this->Paginator->paginate('Family');
		$this->set(compact('families'));
	}

	public function index() {
		$this->Paginator->settings = array('conditions' => array('Family.disposition_id' => '2', 'Family.problem_count >' => '0'),'limit' => 12,'order' => array('Family.name' => 'asc'));
		$families = $this->Paginator->paginate('Family');
		$this->set(compact('families'));
	}
	
	public function Famproblems($arg4) {
		#debug(func_get_args());
		$this->loadModel('Problem');
		##echo $arg4;
		$this->Paginator->settings = array('conditions' => array('Problem.family_id' => $arg4),'order' => array('Problem.name' => 'asc'));
		$problems = $this->Paginator->paginate('Problem');
		$loggedinuser = $this->Auth->User('username');
		$this->set(compact('problems','loggedinuser'));
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Family->exists($id)) {
			throw new NotFoundException(__('Invalid family'));
		}
		$options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
		$this->set('family', $this->Family->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Family->create();
			if ($this->Family->save($this->request->data)) {
				$this->Session->setFlash(__('The family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family could not be saved. Please, try again.'));
			}
		}
		$dispositions = $this->Family->Disposition->find('list');
		$this->set(compact('dispositions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Family->exists($id)) {
			throw new NotFoundException(__('Invalid family'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Family->save($this->request->data)) {
				$this->Session->setFlash(__('The family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
			$this->request->data = $this->Family->find('first', $options);
		}
		$dispositions = $this->Family->Disposition->find('list');
		$this->set(compact('dispositions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Family->id = $id;
		if (!$this->Family->exists()) {
			throw new NotFoundException(__('Invalid family'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Family->delete()) {
			$this->Session->setFlash(__('The family has been deleted.'));
		} else {
			$this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Family->recursive = 0;
		$this->set('families', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Family->exists($id)) {
			throw new NotFoundException(__('Invalid family'));
		}
		$options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
		$this->set('family', $this->Family->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Family->create();
			if ($this->Family->save($this->request->data)) {
				$this->Session->setFlash(__('The family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family could not be saved. Please, try again.'));
			}
		}
		$dispositions = $this->Family->Disposition->find('list');
		$this->set(compact('dispositions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Family->exists($id)) {
			throw new NotFoundException(__('Invalid family'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Family->save($this->request->data)) {
				$this->Session->setFlash(__('The family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
			$this->request->data = $this->Family->find('first', $options);
		}
		$dispositions = $this->Family->Disposition->find('list');
		$this->set(compact('dispositions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Family->id = $id;
		if (!$this->Family->exists()) {
			throw new NotFoundException(__('Invalid family'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Family->delete()) {
			$this->Session->setFlash(__('The family has been deleted.'));
		} else {
			$this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
