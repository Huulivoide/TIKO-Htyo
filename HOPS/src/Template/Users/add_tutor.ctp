<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Access Levels'), ['controller' => 'AccessLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Level'), ['controller' => 'AccessLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Lisää uusi tuutori') ?></legend>
        <?php
            echo $this->Form->input('login', ['type' => 'string', 'label' => __('Käyttäjätunnus')]);
            echo $this->Form->input('password', ['label' => __('Salasana')]);
            echo $this->Form->input('last_name', ['type' => 'string', 'label' => __('Sukunimi')]);
            echo $this->Form->input('first_name', ['type' => 'string', 'label' => __('Etunumi')]);
            echo $this->Form->input('other_name', ['type' => 'string', 'label' => __('Toinen etunimi')]);
            echo $this->Form->input('phone', ['label' => __('Puhelinnumero')]);
            echo $this->Form->input('email', ['label' => __('Sähköpostiosoite')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Lisää')) ?>
    <?= $this->Form->end() ?>
</div>
