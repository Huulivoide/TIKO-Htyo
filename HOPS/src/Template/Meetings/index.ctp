<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki ryhmät'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="meetings index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('group_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Toiminnot') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($meetings as $meeting): ?>
        <tr>
            <td><?= $this->Number->format($meeting->id) ?></td>
            <td><?= h($meeting->date) ?></td>
            <td>
                <?= $meeting->has('group') ? $this->Html->link($meeting->group->id, ['controller' => 'Groups', 'action' => 'view', $meeting->group->id]) : '' ?>
            </td>
            <td>
                <?= $meeting->has('user') ? $this->Html->link($meeting->user->id, ['controller' => 'Users', 'action' => 'view', $meeting->user->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('Tarkastele'), ['action' => 'view', $meeting->id]) ?>
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
