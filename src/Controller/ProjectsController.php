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

}
