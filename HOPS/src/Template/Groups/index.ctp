<div class="actions columns large-2 medium-3">
        <h3><?= __('Toiminnot') ?></h3>
        <ul class="side-nav">
            <?php if ($loggedUser['access_level_id'] == 3): ?>
                <li><?= $this->Html->link(__('Luo ryhmä'), ['action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Kaikki tutorit'), ['controller' => 'Users', 'action' => 'listTutors']) ?> </li>
                <li><?= $this->Html->link(__('Kaikki oppilaat'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
            <?php endif; ?>
            <li><?= $this->Html->link(__('Palaverit'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        </ul>
</div>
<div class="groups index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Ryhmä') ?></th>
            <th class="actions"><?= __('Toiminnot') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <tr>
            <?php if ($loggedUser['id'] == $group->tutor_id || $loggedUser['access_level_id'] == 3): ?>
            <td><?= $this->Html->link($group->name, ['action' => 'view', $group->id]) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Tarkastele'), ['action' => 'view', $group->id]) ?>
            </td>
            <?php endif; ?>
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
