<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Program Structure'), ['action' => 'edit', $programStructure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program Structure'), ['action' => 'delete', $programStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programStructure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['controller' => 'ProgramRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Requirement'), ['controller' => 'ProgramRequirements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programStructures view large-10 medium-9 columns">
    <h2><?= h($programStructure->name) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($programStructure->id) ?></p>
            <h6 class="subheader"><?= __('Year') ?></h6>
            <p><?= $this->Number->format($programStructure->year) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($programStructure->name)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ProgramRequirements') ?></h4>
    <?php if (!empty($programStructure->program_requirements)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Course Type Id') ?></th>
            <th><?= __('Program Structure Id') ?></th>
            <th><?= __('Credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($programStructure->program_requirements as $programRequirements): ?>
        <tr>
            <td><?= h($programRequirements->course_type_id) ?></td>
            <td><?= h($programRequirements->program_structure_id) ?></td>
            <td><?= h($programRequirements->credits) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ProgramRequirements', 'action' => 'view', $programRequirements->course_type_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ProgramRequirements', 'action' => 'edit', $programRequirements->course_type_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProgramRequirements', 'action' => 'delete', $programRequirements->course_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $programRequirements->course_type_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($programStructure->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Entry Year') ?></th>
            <th><?= __('Turor Id') ?></th>
            <th><?= __('Program Structure Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($programStructure->students as $students): ?>
        <tr>
            <td><?= h($students->user_id) ?></td>
            <td><?= h($students->entry_year) ?></td>
            <td><?= h($students->turor_id) ?></td>
            <td><?= h($students->program_structure_id) ?></td>
            <td><?= h($students->group_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->user_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->user_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->user_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Courses') ?></h4>
    <?php if (!empty($programStructure->courses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Year') ?></th>
            <th><?= __('Credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($programStructure->courses as $courses): ?>
        <tr>
            <td><?= h($courses->id) ?></td>
            <td><?= h($courses->name) ?></td>
            <td><?= h($courses->year) ?></td>
            <td><?= h($courses->credits) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courses->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
