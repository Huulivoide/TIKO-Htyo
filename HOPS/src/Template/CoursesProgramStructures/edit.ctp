<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesProgramStructure->course_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesProgramStructure->course_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses Program Structures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesProgramStructures form large-10 medium-9 columns">
    <?= $this->Form->create($coursesProgramStructure); ?>
    <fieldset>
        <legend><?= __('Edit Courses Program Structure') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
