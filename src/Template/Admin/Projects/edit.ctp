<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id, 'prefix' => 'admin'], ['confirm' => __('Are you sure you want to delete # %s?', $project->id)]) ?></li>
		<li><?= $this->Html->link(__('List Projects'), ['action' => 'index', 'prefix' => false]) ?></li>
		<li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index', 'prefix' => false]) ?> </li>
		<li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add', 'prefix' => 'admin']) ?> </li>
	</ul>
</div>
<div class="projects form large-10 medium-9 columns">
<?= $this->Form->create($project) ?>
	<fieldset>
		<legend><?= __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
