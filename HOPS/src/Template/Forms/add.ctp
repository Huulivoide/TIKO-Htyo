<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Forms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses Students'), ['controller' => 'CoursesStudents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Student'), ['controller' => 'CoursesStudents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="forms form large-10 medium-9 columns">
    <?= $this->Form->create($form); ?>
    <fieldset>
        <legend><?= __('Add Form') ?></legend>
        <?php
            echo $this->Form->input('student_id', ['options' => $students]);
            echo $this->Form->input('time');
            echo $this->Form->input('works');
            echo $this->Form->input('weekly_hours');
            echo $this->Form->input('working_reason');
            echo $this->Form->input('interest');
            echo $this->Form->input('secondary_interest');
            echo $this->Form->input('last_year_positive');
            echo $this->Form->input('last_year_negative');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
