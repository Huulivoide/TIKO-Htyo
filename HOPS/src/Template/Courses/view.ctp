<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="courses view large-10 medium-9 columns">
    <h2><?= h($course->name) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($course->id) ?></p>
            <h6 class="subheader"><?= __('Year') ?></h6>
            <p><?= $this->Number->format($course->year) ?></p>
            <h6 class="subheader"><?= __('Credits') ?></h6>
            <p><?= $this->Number->format($course->credits) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($course->name)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related CourseTypes') ?></h4>
    <?php if (!empty($course->course_types)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($course->course_types as $courseTypes): ?>
        <tr>
            <td><?= h($courseTypes->id) ?></td>
            <td><?= h($courseTypes->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'CourseTypes', 'action' => 'view', $courseTypes->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'CourseTypes', 'action' => 'edit', $courseTypes->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CourseTypes', 'action' => 'delete', $courseTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseTypes->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ProgramStructures') ?></h4>
    <?php if (!empty($course->program_structures)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Year') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($course->program_structures as $programStructures): ?>
        <tr>
            <td><?= h($programStructures->id) ?></td>
            <td><?= h($programStructures->name) ?></td>
            <td><?= h($programStructures->year) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ProgramStructures', 'action' => 'view', $programStructures->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ProgramStructures', 'action' => 'edit', $programStructures->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProgramStructures', 'action' => 'delete', $programStructures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programStructures->id)]) ?>

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
    <?php if (!empty($course->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Entry Year') ?></th>
            <th><?= __('Turor Id') ?></th>
            <th><?= __('Program Structure Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($course->students as $students): ?>
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
