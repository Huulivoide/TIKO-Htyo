<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki tutorit'), ['controller' => 'Users', 'action' => 'listTutors']) ?> </li>
        <li><?= $this->Html->link(__('Kaikki oppilaat'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('Nimi') ?></th>
            <th><?= $this->Paginator->sort('Käyttäjätyyppi') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td>
                <?php if ($user->access_level_id == 1): ?>
                    <?= $this->Html->link($user->name, ['controller' => 'Students', 'action' => 'view', $user->id]) ?>
                <?php else: ?>
                    <?= $this->Html->link($user->name, ['controller' => 'Users', 'action' => 'viewTutor', $user->id]) ?>
                <?php endif; ?>                       
            </td>
            <td>
                <?= $user->access_level->name ?>
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
