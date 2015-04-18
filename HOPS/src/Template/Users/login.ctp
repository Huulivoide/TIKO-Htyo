<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Syötä käyttäjä tunnuksesi ja salasanasi') ?></legend>
        <?= $this->Form->input('login', ['label' => __('Käyttäjätunnus')]) ?>
        <?= $this->Form->input('password', ['label' => __('Salasana')]) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
