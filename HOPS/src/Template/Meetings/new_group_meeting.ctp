<style>
    .awayReason {
        display: none;
        width: 100%;
    }
</style>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki palaverit'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Kaikki ryhmät'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="meetings form large-10 medium-9 columns">
    <?= $this->Form->create($meeting); ?>
    <fieldset>
        <legend><?= __('Raportoi uusi ryhmäpalaveri') ?></legend>
        <?=
            $this->Form->input('date', [
                'label' => __('Milloin palaveri pidettiin?'),
                'monthNames' => false,
                'minYear' => 2012,
                'maxYear' => \Cake\I18n\Time::now()->year
            ])
        ?>
        <div class="large-9">
            <?= $this->Form->input('report', ['label' => __('Mitä asioita palaverissa käsiteltiin?')]) ?>
        </div>

        <p><b><?= __('Ketkä ryhmän jäsenistä olivat paikalla?') ?></b></p>

        <p>
            <?= __('Alla lista ryhmän jäsenistä, jos joku heistä ei ollut paikalla tapaamisessa.
Kirjoita kyseisen oppilaan nimen kohdalle poissaolon syy, jos syy ei ole tiedosssa niin kirjoita
kenttään <b>Tuntematon</b>.') ?>
        </p>
        <div>
            <table id="studentList">
                <tr>
                    <th class="medium-2"><?= __('Paikalla') ?></th>
                    <th class="medium-3"><?= __('Oppilas') ?></th>
                    <th><?= __('Poissaolon syy') ?></th>
                </tr>

                <?php $row = 0; foreach ($students as $row => $student): ?>
                    <!-- Record studen't id -->
                    <?= $this->Form->hidden('students.' . $row . '.user_id', ['value' => $student->user_id]) ?>

                    <tr class="studentRow">
                        <td>
                            <?= // Tic if user was present
                                $this->Form->input('showAwayReason.' . $row, [
                                    'type' => 'checkbox',
                                     'label' => false,
                                     'class' => 'enableAwayReason',
                                     'checked' => true])
                            ?>
                        </td>
                        <!-- Display student's name -->
                        <td><?= $student->user->name ?></td>

                        <td>
                            <?= // Textbox for the away reason
                                $this->Form->input('students.' . $row . '._joinData.away_reason', [
                                    'type' => 'string',
                                    'label' => false,
                                    'class' => 'awayReason'])
                            ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Raportoi')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="/js/ckeditor/ckeditor.js"></script>
<script>
    $('.enableAwayReason').on('change', function() {
        var row = $(this).closest('tr');
        var inputField = row.find('.awayReason');

        if (this.checked)
        {
            inputField.val('');
            inputField.hide();
            inputField.prop('required', false);

            row.css('background-color', '');
        }
        else
        {
            inputField.show();
            inputField.prop('required', true);

            row.css('background-color', '#f04124');
        }
    });

    CKEDITOR.replace('report', {
        removePlugins: "image,link,stylescombo,about,sourcearea,maximize,specialchar,elementspath",
        scayt_autoStartup: true,
        scayt_sLang: "<?= \Cake\I18n\I18n::locale() ?>"
    });
</script>
