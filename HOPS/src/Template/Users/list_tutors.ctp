<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki käyttäjät'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Kaikki oppilaat'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Nimi') ?></th>
            <th><?= $this->Paginator->sort('Käyttäjätyyppi') ?></th>
            <th><?=__('Tutoroitavia') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>

        <tr>
            <td>
                <?= $this->Html->link($user->name, ['action' => 'viewTutor', $user->id]) ?>
            </td>
            <td>
                <?= $user->has('access_level') ? $this->Html->link($user->access_level->name, ['controller' => 'AccessLevels', 'action' => 'view', $user->access_level->id]) : '' ?>
            </td>
            <td>
                <?= $user->num_of_tutored ?>
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
