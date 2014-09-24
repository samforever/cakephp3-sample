<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # %s?', $project->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="projects view large-10 medium-9 columns">
	<h2><?= h($project->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($project->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($project->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($project->created) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Active Tasks') ?></h4>
	<?php if (!empty($project->tasks)): ?>
	<ul>
		<?php foreach ($project->tasks as $task): ?>
		<li>
            <?= $this->element('Tasks/list_item', ['task' => $task]) ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
    <div class="column large-12">
        <h4 class="subheader"><?= __('Closed Tasks') ?></h4>
        <?php if (!empty($project->closed_tasks)): ?>
            <ul>
                <?php foreach ($project->closed_tasks as $task): ?>
                    <li><?= $this->element('Tasks/list_item', ['task' => $task]) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>