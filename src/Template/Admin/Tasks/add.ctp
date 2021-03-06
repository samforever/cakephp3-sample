<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Tasks'), ['action' => 'index', 'prefix' => false]) ?></li>
		<li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index', 'prefix' => false]) ?> </li>
		<li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add', 'prefix' => 'admin']) ?> </li>
	</ul>
</div>
<div class="tasks form large-10 medium-9 columns">
<?= $this->Form->create($task) ?>
	<fieldset>
		<legend><?= __('Add Task'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('finished');
		echo $this->Form->input('project_id', ['options' => $projects]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
