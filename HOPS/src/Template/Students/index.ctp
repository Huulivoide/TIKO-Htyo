<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['controller' => 'Forms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="students index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Peruspalvelutunnus') ?></th>
            <th><?= $this->Paginator->sort('Aloitusvuosi') ?></th>
            <th><?= $this->Paginator->sort('Tutor') ?></th>
            <th><?= $this->Paginator->sort('Tutkinto-ohjelma') ?></th>
            <th><?= $this->Paginator->sort('Ryhmä') ?></th>
            <th class="actions"><?= __('Toiminnot') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?= $student->has('user') ? $this->Html->link($student->user->id, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($student->entry_year) ?></td>
            <td>
                <?= $student->has('tutor') ? $this->Html->link($student->tutor->id, ['controller' => 'Users', 'action' => 'view', $student->tutor->id]) : '' ?>
            </td>
            <td>
                <?= $student->has('program_structure') ? $this->Html->link($student->program_structure->name, ['controller' => 'ProgramStructures', 'action' => 'view', $student->program_structure->id]) : '' ?>
            </td>
            <td>
                <?= $student->has('group') ? $this->Html->link($student->group->id, ['controller' => 'Groups', 'action' => 'view', $student->group->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $student->user_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->user_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->user_id)]) ?>
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
