<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Program Requirement'), ['action' => 'edit', $programRequirement->course_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program Requirement'), ['action' => 'delete', $programRequirement->course_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $programRequirement->course_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Requirement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programRequirements view large-10 medium-9 columns">
    <h2><?= h($programRequirement->course_type_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Course Type') ?></h6>
            <p><?= $programRequirement->has('course_type') ? $this->Html->link($programRequirement->course_type->name, ['controller' => 'CourseTypes', 'action' => 'view', $programRequirement->course_type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Program Structure') ?></h6>
            <p><?= $programRequirement->has('program_structure') ? $this->Html->link($programRequirement->program_structure->name, ['controller' => 'ProgramStructures', 'action' => 'view', $programRequirement->program_structure->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Credits') ?></h6>
            <p><?= $this->Number->format($programRequirement->credits) ?></p>
        </div>
    </div>
</div>
