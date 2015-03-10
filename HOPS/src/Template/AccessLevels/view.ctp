<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Access Level'), ['action' => 'edit', $accessLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Access Level'), ['action' => 'delete', $accessLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Access Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="accessLevels view large-10 medium-9 columns">
    <h2><?= h($accessLevel->name) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($accessLevel->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($accessLevel->name)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($accessLevel->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Login') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Access Level Id') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Other Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($accessLevel->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->login) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->access_level_id) ?></td>
            <td><?= h($users->phone) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->first_name) ?></td>
            <td><?= h($users->other_name) ?></td>
            <td><?= h($users->last_name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
