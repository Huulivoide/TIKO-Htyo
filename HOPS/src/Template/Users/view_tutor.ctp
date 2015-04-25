<div class="actions columns large-2 medium-3">
    <h3><?= __('Toiminnot') ?></h3>
    <ul class="side-nav">
        <?php if ($loggedUser['access_level_id'] == 2): ?>
            <h6>Tiedot</h6>
            <li><?= $this->Html->link(__('Omat tietoni'), ['controller' => 'Users', 'action' => 'viewTutor', $loggedUser['id']]) ?> </li>
            <h6>Tutorointi</h6>
            <li><?= $this->Html->link(__('Ryhmät'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Tapaamiset'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
            <h6>Kurssit</h6>
            <li><?= $this->Html->link(__('Lisää kurssi'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>


        <?php elseif ($loggedUser['access_level_id'] == 3  && $loggedUser['id'] == $tutor->id): ?>
            <h6>Tiedot</h6>
            <li><?= $this->Html->link(__('Omat tietoni'), ['controller' => 'Users', 'action' => 'viewTutor', $loggedUser['id']]) ?> </li>
            <h6>Tutorointi</h6>
            <li><?= $this->Html->link(__('Tutorit'), ['controller' => 'Users', 'action' => 'listTutors']) ?> </li>
            <li><?= $this->Html->link(__('Oppilaat'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Ryhmät'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Tapaamiset'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
            <h6>Kurssit</h6>
            <li><?= $this->Html->link(__('Lisää kurssi'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
       <?php else: ?>
            <li><?= $this->Html->link(__('Kaikki tutorit'), ['controller' => 'Users', 'action' => 'listTutors']) ?> </li>
       <?php endif; ?>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= __('Opettajatuutorin tiedot') ?></h2>
    <div class="row">
        <div class="columns strings large-6">
            <h6 class="subheader"><?= __('Nimi') ?></h6>
            <p><?= $tutor->name ?></p>

            <h6 class="subheader"><?= __('Puhelinnumero') ?></h6>
            <p><?= $tutor->phone ?></p>

            <h6 class="subheader"><?= __('Sähköpostiosoite') ?></h6>
            <p><?= $this->Text->autoLinkEmails($tutor->email) ?></p>

            <h6 class="subheader"><?= __('Tutoroitavia') ?></h6>
            <p><?= $tutor->num_of_tutored ?></p>

        </div>
    </div>

    <div class="row large-10 medium-9">
        <h4 class="subheader"><?= __('Tuutorointiryhmät') ?></h4>
        <p>
            <span style="background-color: beige">Ensimmäisen vuoden ryhmä</span>,
            <span style="background-color: deeppink">Toisen vuoden ryhmä</span>,
            <span style="background-color: coral">Kolmannen vuoden ryhmä</span>
        </p>
        <ul>
            <?php foreach ($groups as $group): ?>
                <?php
                    $yearsStudied = $currentYear - $group->year + 1;
                    $color = "beige";
                    if ($yearsStudied == 2)
                        $color = "deeppink";
                    else if ($yearsStudied == 3)
                        $color = "coral";

                ?>
                <li style="background-color: <?= $color ?>">
                    <?=
                    $this->Html->link($group->name, [
                        'controller' => 'Groups',
                        'action' => 'view',
                        $group->id
                    ])
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="row large-10 medium-9">
        <h4 class="subheader"><?= __('Tuutoroidut oppilaat') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= __('Opiskelijanumero') ?></th>
                    <th><?= __('Nimi') ?></th>
                    <th><?= __('Aloitusvuosi') ?></th>
                    <th><?= __('Pääaine') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td>
                            <?=
                            $this->Html->link($student->studentNumber, [
                                'controller' => 'Students',
                                'action' => 'view',
                                $student->user->id
                            ])
                            ?>
                        </td>
                        <td>
                            <?=
                                $this->Html->link($student->user->name, [
                                    'controller' => 'Students',
                                    'action' => 'view',
                                    $student->user->id
                                ])
                            ?>
                        </td>
                        <td><?= $student->entry_year ?></td>
                        <td><?= $student->program_structure->name ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</div>
