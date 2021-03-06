<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Project'), ['action' => 'add', 'prefix' => 'admin']) ?></li>
		<li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index', 'prefix' => false]) ?> </li>
		<li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add', 'prefix' => 'admin']) ?> </li>
	</ul>
</div>
<div class="projects index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
		<tr>
			<td><?= $this->Number->format($project->id) ?></td>
			<td><?= h($project->name) ?></td>
			<td><?= h($project->created) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id, 'prefix' => 'admin']) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id, 'prefix' => 'admin'], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
