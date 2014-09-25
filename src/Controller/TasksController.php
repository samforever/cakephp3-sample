<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Projects']
		];
		$this->set('tasks', $this->paginate($this->Tasks));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$task = $this->Tasks->get($id, [
			'contain' => ['Projects']
		]);
		$this->set('task', $task);
	}

}
