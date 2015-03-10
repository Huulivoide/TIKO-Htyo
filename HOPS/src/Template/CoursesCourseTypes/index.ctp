<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Courses Course Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesCourseTypes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('course_id') ?></th>
            <th><?= $this->Paginator->sort('course_type_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($coursesCourseTypes as $coursesCourseType): ?>
        <tr>
            <td>
                <?= $coursesCourseType->has('course') ? $this->Html->link($coursesCourseType->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesCourseType->course->id]) : '' ?>
            </td>
            <td>
                <?= $coursesCourseType->has('course_type') ? $this->Html->link($coursesCourseType->course_type->name, ['controller' => 'CourseTypes', 'action' => 'view', $coursesCourseType->course_type->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $coursesCourseType->course_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesCourseType->course_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesCourseType->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesCourseType->course_id)]) ?>
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
