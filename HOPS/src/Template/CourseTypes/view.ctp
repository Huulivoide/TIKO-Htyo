<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Course Type'), ['action' => 'edit', $courseType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course Type'), ['action' => 'delete', $courseType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['controller' => 'ProgramRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Requirement'), ['controller' => 'ProgramRequirements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="courseTypes view large-10 medium-9 columns">
    <h2><?= h($courseType->name) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($courseType->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($courseType->name)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ProgramRequirements') ?></h4>
    <?php if (!empty($courseType->program_requirements)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Course Type Id') ?></th>
            <th><?= __('Program Structure Id') ?></th>
            <th><?= __('Credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($courseType->program_requirements as $programRequirements): ?>
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
    <h4 class="subheader"><?= __('Related Courses') ?></h4>
    <?php if (!empty($courseType->courses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Year') ?></th>
            <th><?= __('Credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($courseType->courses as $courses): ?>
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
