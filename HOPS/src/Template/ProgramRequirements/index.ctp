<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Program Requirement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programRequirements index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('course_type_id') ?></th>
            <th><?= $this->Paginator->sort('program_structure_id') ?></th>
            <th><?= $this->Paginator->sort('credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($programRequirements as $programRequirement): ?>
        <tr>
            <td>
                <?= $programRequirement->has('course_type') ? $this->Html->link($programRequirement->course_type->name, ['controller' => 'CourseTypes', 'action' => 'view', $programRequirement->course_type->id]) : '' ?>
            </td>
            <td>
                <?= $programRequirement->has('program_structure') ? $this->Html->link($programRequirement->program_structure->name, ['controller' => 'ProgramStructures', 'action' => 'view', $programRequirement->program_structure->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($programRequirement->credits) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $programRequirement->course_type_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $programRequirement->course_type_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $programRequirement->course_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $programRequirement->course_type_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
