<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Meetings Student'), ['action' => 'edit', $meetingsStudent->student_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meetings Student'), ['action' => 'delete', $meetingsStudent->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingsStudent->student_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meetings Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meetings Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="meetingsStudents view large-10 medium-9 columns">
    <h2><?= h($meetingsStudent->student_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p><?= $meetingsStudent->has('student') ? $this->Html->link($meetingsStudent->student->user_id, ['controller' => 'Students', 'action' => 'view', $meetingsStudent->student->user_id]) : '' ?></p>
            <h6 class="subheader"><?= __('Meeting') ?></h6>
            <p><?= $meetingsStudent->has('meeting') ? $this->Html->link($meetingsStudent->meeting->id, ['controller' => 'Meetings', 'action' => 'view', $meetingsStudent->meeting->id]) : '' ?></p>
        </div>
    </div>
</div>
