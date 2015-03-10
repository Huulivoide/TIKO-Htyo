<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesStudent->course_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesStudent->course_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesStudents form large-10 medium-9 columns">
    <?= $this->Form->create($coursesStudent); ?>
    <fieldset>
        <legend><?= __('Edit Courses Student') ?></legend>
        <?php
            echo $this->Form->input('form_id', ['options' => $forms, 'empty' => true]);
            echo $this->Form->input('planned_finishing_date');
            echo $this->Form->input('finishing_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
