<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController {

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$task = $this->Tasks->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Tasks->save($task)) {
				$this->Flash->success('The task has been saved.');
				return $this->redirect(['action' => 'index', 'prefix' => false]);
			} else {
				$this->Flash->error('The task could not be saved. Please, try again.');
			}
		}
		$projects = $this->Tasks->Projects->find('list');
		$this->set(compact('task', 'projects'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$task = $this->Tasks->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$task = $this->Tasks->patchEntity($task, $this->request->data);
			if ($this->Tasks->save($task)) {
				$this->Flash->success('The task has been saved.');
				return $this->redirect(['action' => 'index', 'prefix' => false]);
			} else {
				$this->Flash->error('The task could not be saved. Please, try again.');
			}
		}
		$projects = $this->Tasks->Projects->find('list');
		$this->set(compact('task', 'projects'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$task = $this->Tasks->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Tasks->delete($task)) {
			$this->Flash->success('The task has been deleted.');
		} else {
			$this->Flash->error('The task could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index', 'prefix' => false]);
	}

}
