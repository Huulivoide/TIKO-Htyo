<script>
    $(document).ready(function() {
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

                row.css('background-color', 'red');
            }
        })
    });
</script>

<style>
    .awayReason {
        display: none;
        width: 100%;
    }

    #studentList th:nth-child(1),
    #studentList td:nth-child(1)
    {
        width: 10%;
    }
    #studentList th:nth-child(2),
    #studentList td:nth-child(2) {
        width: 30%;
    }

    #studentList th:nth-child(3),
    #studentList td:nth-child(3) {
        width: 60%;
    }

</style>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="meetings form large-10 medium-9 columns">
    <?= $this->Form->create($meeting); ?>
    <fieldset>
        <legend><?= __('Add Meeting') ?></legend>
        <?php
            echo $this->Form->input('date', ['label' => __('Milloin palaveri pidettiin?')]);
            echo $this->Form->input('report', ['label' => __('Mitä asioita palaverissa käsiteltiin?')]);
        ?>

        <p><b><?= __('Ketkä ryhmän jäsenistä olivat paikalla?') ?></b></p>

        <p>
            <?= __('Alla lista ryhmän jäsenistä, jos joku heistä ei ollut paikalla tapaamisessa.
Kirjoita kyseisen oppilaan nimen kohdalle poissaolon syy, jos syy ei ole tiedosssa niin kirjoita
kenttään <b>Tuntematon</b>.') ?>
        </p>
        <div>
            <table id="studentList">
                <tr>
                    <th><?= __('Paikalla') ?></th>
                    <th><?= __('Oppilas') ?></th>
                    <th><?= __('Poissaolon syy') ?></th>
                </tr>

                <?php
                    $row = 0;
                    foreach ($students as $student)
                    {
                        // Record the student's id number
                        echo $this->Form->hidden('students.' . $row . '.user_id', ['value' => $student->user_id]);

                        echo "<tr class='studentRow'>";

                        echo "<td>"; // tick to tell if student was present or not
                        echo $this->Form->input('showAwayReason.' . $row, ['type' => 'checkbox',
                                                                           'label' => false,
                                                                           'class' => 'enableAwayReason',
                                                                           'checked' => true]);
                        echo "</td>";

                        // Display student's name
                        echo '<td>' . $student->user->name . '</td>';

                        echo '<td>'; // Textbox for the away reason
                        echo $this->Form->input('students.' . $row . '._joinData.away_reason',
                                                ['type' => 'string', 'label' => false, 'class' => 'awayReason']);
                        echo '</td>';

                        echo '</tr>';

                        $row += 1;
                    }
                ?>

            </table>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Raportoi')) ?>
    <?= $this->Form->end() ?>
</div>
