<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesCourseType->course_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesCourseType->course_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses Course Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesCourseTypes form large-10 medium-9 columns">
    <?= $this->Form->create($coursesCourseType); ?>
    <fieldset>
        <legend><?= __('Edit Courses Course Type') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
