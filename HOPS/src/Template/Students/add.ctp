<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki oppilaat'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="students form large-10 medium-9 columns">
    <?= $this->Form->create($student); ?>
    <fieldset>
        <legend><?= __('Täytä tietosi') ?></legend>
        <?php
            echo $this->Form->input('user.last_name', ['type' => 'string', 'label' => __('Sukunimi')]);
            echo $this->Form->input('user.first_name', ['type' => 'string', 'label' => __('Etunimi')]);
            echo $this->Form->input('user.other_name', ['type' => 'string', 'label' => __('Toinen etunimi')]);
            echo $this->Form->input('entry_year', [
                'type' => 'year',
                'label' => __('Minä vuonna aloitit tutkinto-ohjelmassa?'),
                'maxYear' => date('Y'),
                'minYear' => 2012
            ]);
            echo $this->Form->input('program_structure_id', [
                'options' => $programStructures,
                'label' => __('Mitä tutkintoa suoritat?'),
            ]);
            echo $this->Form->input('user.phone', ['type' => 'phone', 'label' => __('Puhelinnumero')]);
            echo $this->Form->input('user.email', [
                'type' => 'email',
                'label' => __('Sähköpostiosoite'),
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    var firstNameInput = $('#user-first-name');
    var otherNameInput = $('#user-other-name');
    var lastNameInput =  $('#user-last-name');
    var emailInput = $('#user-email');

    $('#user-first-name, #user-other-name, #user-last-name').on('change', function() {
        var email = lastNameInput.val();

        if (firstNameInput.val() != '')
            email += '.' + firstNameInput.val();
        if (otherNameInput.val() != '')
            email += '.' + otherNameInput.val().charAt(0);
        else
            email += '.' + 'x';

        emailInput.val(email + '@student.uta.fi');
    })
</script>
