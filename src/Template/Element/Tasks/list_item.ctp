<?= h($task->id) ?> - <?= h($task->name) ?>

[
    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $task->id]) ?>
    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id]) ?>
    <?= $this->Form->postLink(
        __('Delete'),
        ['controller' => 'Tasks', 'action' => 'delete', $task->id],
        ['confirm' => __('Are you sure you want to delete # %s?', $task->id)]
    ) ?>

]