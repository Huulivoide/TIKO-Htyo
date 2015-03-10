<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Courses Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesStudents index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('course_id') ?></th>
            <th><?= $this->Paginator->sort('form_id') ?></th>
            <th><?= $this->Paginator->sort('student_id') ?></th>
            <th><?= $this->Paginator->sort('planned_finishing_date') ?></th>
            <th><?= $this->Paginator->sort('finishing_date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($coursesStudents as $coursesStudent): ?>
        <tr>
            <td>
                <?= $coursesStudent->has('course') ? $this->Html->link($coursesStudent->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesStudent->course->id]) : '' ?>
            </td>
            <td>
                <?= $coursesStudent->has('form') ? $this->Html->link($coursesStudent->form->id, ['controller' => 'Forms', 'action' => 'view', $coursesStudent->form->id]) : '' ?>
            </td>
            <td>
                <?= $coursesStudent->has('student') ? $this->Html->link($coursesStudent->student->user_id, ['controller' => 'Students', 'action' => 'view', $coursesStudent->student->user_id]) : '' ?>
            </td>
            <td><?= h($coursesStudent->planned_finishing_date) ?></td>
            <td><?= h($coursesStudent->finishing_date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $coursesStudent->course_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesStudent->course_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesStudent->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesStudent->course_id)]) ?>
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
