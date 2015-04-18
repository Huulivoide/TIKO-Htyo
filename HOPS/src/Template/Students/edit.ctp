<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $student->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $student->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="students form large-10 medium-9 columns">
    <?= $this->Form->create($student); ?>
    <fieldset>
        <legend><?= __('Edit Student') ?></legend>
        <?php
            echo $this->Form->input('Aloitusvuosi');
            echo $this->Form->input('tutor_id', ['options' => $tutors, 'empty' => true]);
            echo $this->Form->input('program_structure_id', ['options' => $programStructures, 'label' => __('Tutkinto-ohjelma')]);
            echo $this->Form->input('group_id', ['options' => $groups, 'empty' => true, 'label' => __('Ryhmä')]);
            echo $this->Form->input('courses._ids', ['options' => $courses, 'label' => __('Kurssit')]);
            echo $this->Form->input('meetings._ids', ['options' => $meetings, 'label' => __('Tapaamiset')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Lähetä')) ?>
    <?= $this->Form->end() ?>
</div>
