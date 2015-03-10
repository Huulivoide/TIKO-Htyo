<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Meetings Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="meetingsStudents index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('student_id') ?></th>
            <th><?= $this->Paginator->sort('meeting_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($meetingsStudents as $meetingsStudent): ?>
        <tr>
            <td>
                <?= $meetingsStudent->has('student') ? $this->Html->link($meetingsStudent->student->user_id, ['controller' => 'Students', 'action' => 'view', $meetingsStudent->student->user_id]) : '' ?>
            </td>
            <td>
                <?= $meetingsStudent->has('meeting') ? $this->Html->link($meetingsStudent->meeting->id, ['controller' => 'Meetings', 'action' => 'view', $meetingsStudent->meeting->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $meetingsStudent->student_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingsStudent->student_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingsStudent->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingsStudent->student_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
