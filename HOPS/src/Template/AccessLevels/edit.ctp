<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accessLevel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accessLevel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Access Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="accessLevels form large-10 medium-9 columns">
    <?= $this->Form->create($accessLevel); ?>
    <fieldset>
        <legend><?= __('Edit Access Level') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
