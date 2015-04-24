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
            <th><?= $this->Paginator->sort('Oppilas') ?></th>
            <th><?= $this->Paginator->sort('Palautusaika') ?></th>
            <th><?= $this->Paginator->sort('Tarkastaja') ?></th>
            <th class="actions"><?= __('Toiminnot') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($forms as $form): ?>
        <tr>
            <td>
                <?= $form->has('student') ? $this->Html->link($form->student->user->name, ['controller' => 'Students', 'action' => 'view', $form->student->user_id]) : '' ?>
            </td>
            <td><?= h($form->time) ?></td>
            <td>
                <?= $form->has('student') ? $this->Html->link($form->student->tutor->name, ['controller' => 'Users', 'action' => 'viewTutor', $form->student->tutor_id]) : '' ?>
            </td>
            <td>
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
