<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $programRequirement->course_type_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $programRequirement->course_type_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programRequirements form large-10 medium-9 columns">
    <?= $this->Form->create($programRequirement); ?>
    <fieldset>
        <legend><?= __('Edit Program Requirement') ?></legend>
        <?php
            echo $this->Form->input('credits');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
