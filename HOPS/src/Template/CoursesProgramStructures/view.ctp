<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Courses Program Structure'), ['action' => 'edit', $coursesProgramStructure->course_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courses Program Structure'), ['action' => 'delete', $coursesProgramStructure->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesProgramStructure->course_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses Program Structures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Program Structure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesProgramStructures view large-10 medium-9 columns">
    <h2><?= h($coursesProgramStructure->course_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Course') ?></h6>
            <p><?= $coursesProgramStructure->has('course') ? $this->Html->link($coursesProgramStructure->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesProgramStructure->course->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Program Structure') ?></h6>
            <p><?= $coursesProgramStructure->has('program_structure') ? $this->Html->link($coursesProgramStructure->program_structure->name, ['controller' => 'ProgramStructures', 'action' => 'view', $coursesProgramStructure->program_structure->id]) : '' ?></p>
        </div>
    </div>
</div>
