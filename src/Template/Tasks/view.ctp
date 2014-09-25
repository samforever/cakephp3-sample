<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id, 'prefix' => 'admin']) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id, 'prefix' => 'admin'], ['confirm' => __('Are you sure you want to delete # %s?', $task->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Tasks'), ['action' => 'index', 'prefix' => false]) ?> </li>
		<li><?= $this->Html->link(__('New Task'), ['action' => 'add', 'prefix' => 'admin']) ?> </li>
		<li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index', 'prefix' => false]) ?> </li>
		<li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add', 'prefix' => 'admin']) ?> </li>
	</ul>
</div>
<div class="tasks view large-10 medium-9 columns">
	<h2><?= h($task->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($task->name) ?></p>
			<h6 class="subheader"><?= __('Project') ?></h6>
			<p><?= $task->has('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id, 'prefix' => false]) : '' ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($task->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($task->created) ?></p>
			<h6 class="subheader"><?= __('Finished') ?></h6>
			<p><?= h($task->finished) ?></p>
		</div>
	</div>
</div>
