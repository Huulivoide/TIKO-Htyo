<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Courses Program Structure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coursesProgramStructures index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('course_id') ?></th>
            <th><?= $this->Paginator->sort('program_structure_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($coursesProgramStructures as $coursesProgramStructure): ?>
        <tr>
            <td>
                <?= $coursesProgramStructure->has('course') ? $this->Html->link($coursesProgramStructure->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesProgramStructure->course->id]) : '' ?>
            </td>
            <td>
                <?= $coursesProgramStructure->has('program_structure') ? $this->Html->link($coursesProgramStructure->program_structure->name, ['controller' => 'ProgramStructures', 'action' => 'view', $coursesProgramStructure->program_structure->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $coursesProgramStructure->course_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesProgramStructure->course_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesProgramStructure->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesProgramStructure->course_id)]) ?>
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
