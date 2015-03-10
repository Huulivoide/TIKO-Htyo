<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Meeting'), ['action' => 'edit', $meeting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meeting'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="meetings view large-10 medium-9 columns">
    <h2><?= h($meeting->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $meeting->has('group') ? $this->Html->link($meeting->group->id, ['controller' => 'Groups', 'action' => 'view', $meeting->group->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $meeting->has('user') ? $this->Html->link($meeting->user->id, ['controller' => 'Users', 'action' => 'view', $meeting->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($meeting->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($meeting->date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Report') ?></h6>
            <?= $this->Text->autoParagraph(h($meeting->report)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($meeting->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Entry Year') ?></th>
            <th><?= __('Turor Id') ?></th>
            <th><?= __('Program Structure Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($meeting->students as $students): ?>
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
