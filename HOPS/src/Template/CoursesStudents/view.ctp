<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Courses Student'), ['action' => 'edit', $coursesStudent->course_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courses Student'), ['action' => 'delete', $coursesStudent->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesStudent->course_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesStudents view large-10 medium-9 columns">
    <h2><?= h($coursesStudent->course_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Course') ?></h6>
            <p><?= $coursesStudent->has('course') ? $this->Html->link($coursesStudent->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesStudent->course->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Form') ?></h6>
            <p><?= $coursesStudent->has('form') ? $this->Html->link($coursesStudent->form->id, ['controller' => 'Forms', 'action' => 'view', $coursesStudent->form->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p><?= $coursesStudent->has('student') ? $this->Html->link($coursesStudent->student->user_id, ['controller' => 'Students', 'action' => 'view', $coursesStudent->student->user_id]) : '' ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Planned Finishing Date') ?></h6>
            <p><?= h($coursesStudent->planned_finishing_date) ?></p>
            <h6 class="subheader"><?= __('Finishing Date') ?></h6>
            <p><?= h($coursesStudent->finishing_date) ?></p>
        </div>
    </div>
</div>
