<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Form'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses Students'), ['controller' => 'CoursesStudents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Student'), ['controller' => 'CoursesStudents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="forms index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('student_id') ?></th>
            <th><?= $this->Paginator->sort('time') ?></th>
            <th><?= $this->Paginator->sort('works') ?></th>
            <th><?= $this->Paginator->sort('weekly_hours') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($forms as $form): ?>
        <tr>
            <td><?= $this->Number->format($form->id) ?></td>
            <td>
                <?= $form->has('student') ? $this->Html->link($form->student->user_id, ['controller' => 'Students', 'action' => 'view', $form->student->user_id]) : '' ?>
            </td>
            <td><?= h($form->time) ?></td>
            <td><?= h($form->works) ?></td>
            <td><?= $this->Number->format($form->weekly_hours) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $form->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $form->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $form->id], ['confirm' => __('Are you sure you want to delete # {0}?', $form->id)]) ?>
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
