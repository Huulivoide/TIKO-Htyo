<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Uusi lomake'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="forms index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('student_id') ?></th>
            <th><?= $this->Paginator->sort('time') ?></th>
            <th><?= $this->Paginator->sort('works') ?></th>
            <th><?= $this->Paginator->sort('weekly_hours') ?></th>
            <th class="actions"><?= __('Toiminnot') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($forms as $form): ?>
        <tr>
            <td><?= $this->Number->format($form->id) ?></td>
            <td>
                <?= $form->has('student') ? $this->Html->link($form->student->user_id, ['controller' => 'Students', 'action' => 'view', $form->student->user_id]) : '' ?>
            </td>
            <td><?= h($form->time) ?></td>
            <td><?= h($form->works) ?></td>
            <td><?= $this->Number->format($form->weekly_hours) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Tarkastele'), ['action' => 'view', $form->id]) ?>
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
