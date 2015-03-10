<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Program Structures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['controller' => 'ProgramRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Requirement'), ['controller' => 'ProgramRequirements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programStructures form large-10 medium-9 columns">
    <?= $this->Form->create($programStructure); ?>
    <fieldset>
        <legend><?= __('Add Program Structure') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('year');
            echo $this->Form->input('courses._ids', ['options' => $courses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
