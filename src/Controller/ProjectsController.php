<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('projects', $this->paginate($this->Projects));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$project = $this->Projects->get($id, [
			'contain' => ['Tasks', 'ClosedTasks']
		]);
		$this->set('project', $project);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$project = $this->Projects->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Projects->save($project)) {
				$this->Flash->success('The project has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The project could not be saved. Please, try again.');
			}
		}
		$this->set(compact('project'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$project = $this->Projects->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$project = $this->Projects->patchEntity($project, $this->request->data);
			if ($this->Projects->save($project)) {
				$this->Flash->success('The project has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The project could not be saved. Please, try again.');
			}
		}
		$this->set(compact('project'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$project = $this->Projects->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Projects->delete($project)) {
			$this->Flash->success('The project has been deleted.');
		} else {
			$this->Flash->error('The project could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
