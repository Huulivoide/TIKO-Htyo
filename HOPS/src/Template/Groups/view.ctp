<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?php if ($loggedUser['access_level_id'] == 3): ?>
            <li><?= $this->Html->link(__('Näytä kaikki ryhmät'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Luo uusi ryhmä'), ['action' => 'add']) ?> </li>
        <?php endif; ?>
        <li>
            <?=
                $this->Html->link(__('Raportoi uusi tapaaminen'), [
                    'controller' => 'Meetings',
                    'action' => 'newGroupMeeting',
                    $group->id
                ])
            ?>
        </li>
        <li>
            <?=
                $this->Html->link(__('Lähetä ryhmäläisille viesti'), [
                    'controller' => 'Groups',
                    'action' => 'sendMail',
                    $group->id
                ])
            ?>
        </li>
    </ul>
</div>
<div class="groups view large-10 medium-9 columns">
    <h2><?= __('Tuutorointiryhmän tiedot') ?></h2>
<!-- Group information -->
    <div class="row" style="margin-bottom: 1rem">
        <div class="large-8 columns strings">
            <h6 class="subheader"><?= __('Ryhmän pääasiallinen pääaine') ?></h6>
            <p><?= $group->program_structure->name ?></p>

            <h6 class="subheader"><?= __('Ryhmän perustamisvuosi') ?></h6>
            <p><?= $group->year ?></p>

            <h6 class="subheader"><?= __('Minkä vuosikurssin oppilaita oppilaat ovat') ?></h6>
            <p><?= $yearsStudied ?></p>

            <h6 class="subheader"><?= __('Ryhmän numero') ?></h6>
            <p><?= $group->identifier ?></p>

            <h6 class="subheader"><?= __('Ryhmän vastaava tuutori') ?></h6>
            <p>
                <?=
                    $this->Html->link($group->tutor->name, [
                        'controller' => 'Users',
                        'action' => 'viewTutor',
                        $group->tutor->id])
                ?>
            </p>
        </div>
        <div class="large-2 columns numbers">
            <h6 class="subheader"><?= __('Ryhmän koko') ?></h6>
            <p><?= $students->count() ?></p>
        </div>
        <div class="columns end"></div>
    </div>

<!-- Group meetings- -->
    <div class="row" style="margin-bottom: 1rem">
        <div class="columns strings large-8 medium-7">
            <h4 class="subheader"><?= __('Ryhmäpalaverit') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th><?= __('Päivämäärä') ?></th>
                        <th><?= __('Osallistuja määrä') ?></th>
                        <th><?= __('Linkki') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($group->meetings as $meeting): ?>
                        <tr> <!-- Show date, but hide time as it is not even stored in the DB, but Cake shows 0:00 by default anyway -->
                            <td><?= $meeting->date->i18nFormat([\IntlDateFormatter::SHORT, \IntlDateFormatter::NONE]) ?></td>
                            <td>
                                <?= // (Number of students present)/(number of students who should have been present [group's size at the moment of creating the meeting])
                                    ($meeting->totalStudents - $meeting->absentStudents) . '/' . $meeting->totalStudents
                                ?>
                            </td>
                            <td>
                                <?= // Link to the meetings info page.
                                    $this->Html->link(__('Tarkastele'), [
                                        'controller' => 'Meetings',
                                        'action' => 'view',
                                        $meeting->id])
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="columns end"></div>
    </div>

<!-- List of students in the group -->
    <div class="row">
        <div class="columns strings large-12 medium-12">
            <h4 class="subheader"><?= __('Ryhmän jäsenet') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= __('Opiskelijanumero') ?></th>
                    <th><?= __('Nimi') ?></th>
                    <th><?= __('Tuutori') ?></th>
                    <th><?= __('Yksityispalaverit') ?></th>
                    <th><?= __('Ryhmäpalaverit') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student->studentNumber ?></td>
                        <td>
                            <?= // Link to student page
                                $this->Html->link($student->user->name, [
                                    'controller' => 'Students',
                                    'action' => 'view',
                                    $student->user_id])
                            ?>
                        </td>
                        <td>
                            <?php // If has tutor, link to his user page, else tell that student has no tutor
                                if ($student->tutor !== null)
                                {
                                    echo $this->Html->link($student->tutor->name, [
                                            'controller' => 'Users',
                                            'action' => 'viewTutor',
                                            $student->tutor_id]);
                                }
                                else
                                {
                                    echo __('Opiskelijalla ei ole tuutoria');
                                }
                            ?>
                        </td>
                        <td><?= count($student->PrivateMeetings) ?></td>
                        <td>
                            <?php
                                $total = count($student->GroupMeetings);
                                $absent = count($student->AbsentGroupMeetings);
                                echo ($total - $absent) . '/' . $total;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="columns end"></div>
    </div>
</div>

