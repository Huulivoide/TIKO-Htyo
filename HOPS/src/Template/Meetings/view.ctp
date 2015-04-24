<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(__('Poista palaveri'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?> </li>
        <li><?= $this->Html->link(__('Kaikki palaverit'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="meetings view large-10 columns">
    <h2><?= (count($meeting->students) > 1) ?__('Ryhmäpalaveriraportti') : __('Yksityistapaamisraportti') ?></h2>
    <div class="row">
        <div class="large-12 columns strings">
            <?php if (count($meeting->students) > 1): ?>
                <h6 class="subheader"><?= __('Ryhmä') ?></h6>
                <p><?= $this->Html->link($meeting->group->name, ['controller' => 'Groups', 'action' => 'view', $meeting->group->id]) ?></p>
            <?php elseif (count($meeting->students) == 1): ?>
                <h6 class="subheader"><?= __('Opiskelija') ?></h6>
                <p>
                    <?php
                        $studentNumber = $meeting->students[0]->studentNumber;
                        $studentName = $meeting->students[0]->user->name;

                        echo $this->Html->link($studentNumber.': '.$studentName,[
                            'controller' => 'Students',
                            'action' => 'view',
                            $meeting->students[0]->user_id]);
                    ?>
                </>
            <?php endif; ?>
            <h6 class="subheader"><?= __('Vastaava tuutori') ?></h6>
            <p><?= $this->Html->link($meeting->tutor->name, ['controller' => 'Users', 'action' => 'viewTutor', $meeting->tutor->id]) ?></p>
            <h6 class="subheader"><?= __('Päivämäärä') ?></h6>
            <p><?= h($meeting->date->i18nFormat([\IntlDateFormatter::SHORT, \IntlDateFormatter::NONE])) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns strings large-12">
            <h4 class="subheader"><?= __('Palaverissa käsitellyt asiat') ?></h4>
            <?= $meeting->report ?>

        </div>
    </div>

    <?php if (count($meeting->students) > 1): ?>
        <div class="row texts">
            <div class="columns strings large-12">
                <h4 class="subheader"><?= __('Palaverissa mukana ja poissa olleet ryhmän opiskelijat') ?></h4>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th class="medium-3"><?= __('Opiskelijanumero') ?></th>
                        <th class="medium-3"><?= __('Nimi') ?></th>
                        <th class="medium-6"><?= __('Mahdollisen poissaolon syy') ?></th>
                    </tr>
                    <?php foreach ($meeting->students as $student): ?>
                        <tr>
                            <td><?= $this->Html->link($student->studentNumber,['controller' => 'Students', 'action' => 'view', $meeting->students[0]->user_id]) ?></td>
                            <td><?= $this->Html->link($student->user->name,['controller' => 'Students', 'action' => 'view', $meeting->students[0]->user_id]) ?></td>
                            <?php if ($student->_joinData->away_reason !== ""): ?>
                                <td class="errorbg"><?= $student->_joinData->away_reason ?></td>
                            <?php else: ?>
                                <td><?= $student->_joinData->away_reason ?></td>
                            <?php endif; ?>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
