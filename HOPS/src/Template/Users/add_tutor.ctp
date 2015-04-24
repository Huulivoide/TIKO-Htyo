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
