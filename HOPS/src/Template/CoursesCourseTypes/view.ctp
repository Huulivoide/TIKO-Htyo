<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Courses Course Type'), ['action' => 'edit', $coursesCourseType->course_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courses Course Type'), ['action' => 'delete', $coursesCourseType->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesCourseType->course_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses Course Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Course Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesCourseTypes view large-10 medium-9 columns">
    <h2><?= h($coursesCourseType->course_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Course') ?></h6>
            <p><?= $coursesCourseType->has('course') ? $this->Html->link($coursesCourseType->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesCourseType->course->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Course Type') ?></h6>
            <p><?= $coursesCourseType->has('course_type') ? $this->Html->link($coursesCourseType->course_type->name, ['controller' => 'CourseTypes', 'action' => 'view', $coursesCourseType->course_type->id]) : '' ?></p>
        </div>
    </div>
</div>
