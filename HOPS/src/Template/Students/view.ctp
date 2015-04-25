<div class="actions columns large-2 medium-3">
    <h3><?= __('Toiminnot') ?></h3>
    <ul class="side-nav">
        <?php if ($loggedUser['access_level_id'] == 1): ?>
            <h6>HOPS</h6>
            <li><?= $this->Html->link(__('Lisää HOPS'), ['controller' => 'Forms', 'action' => 'add']) ?> </li>
            <h6>Tiedot</h6>
            <li><?= $this->Html->link(__('Omat tietoni'), ['controller' => 'Students', 'action' => 'view', $student->user->id]) ?> </li>

        <?php else: ?>
            <li><?= $this->Html->link(__('Raportoi palaveri'), ['controller' => 'Meetings', 'action' => 'newPrivateMeeting', $student->user_id]) ?> </li>
        <?php endif; ?>
    </ul>
</div>
<div class="students view large-10 medium-9 columns">
    <h2><?= __('Oppilaan tiedot') ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nimi') ?></h6>
            <p><?= $student->user->name ?></p>
            <h6 class="subheader"><?= __('Tuutori') ?></h6>
            <p><?= $student->has('tutor') ? $this->Html->link($student->tutor->name, ['controller' => 'Users', 'action' => 'viewTutor', $student->tutor->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Tutkinto-ohjelma') ?></h6>
            <p><?= $student->program_structure->name ?></p>
            <h6 class="subheader"><?= __('Ryhmä') ?></h6>
            <p><?= $student->has('group') ? $this->Html->link($student->group->name, ['controller' => 'Groups', 'action' => 'view', $student->group->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Aloitusvuosi') ?></h6>
            <p><?= $this->Number->format($student->entry_year) ?></p>
        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-5">
            <h4 class="subheader"><?= __('Täytetyt HOPS-lomakkeet') ?></h4>
            <?php if (!empty($student->forms)): ?>
                <ul>
                    <?php foreach ($student->forms as $form): ?>
                        <li>
                            <?= $this->Html->link($form->time->format('d.m.Y'), ['controller' => 'Forms', 'action' => 'view', $form->id]) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="large-5 columns numbers end">
            <h4 class="subheader"><?= __('Opintopistemäärät lukukausittain') ?></h4>
            <?php foreach ($student->points as $semester=>$points): ?>
                <h6 class="subheader"><?= $semester ?></h6>
                <p><?= $points ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row texts">
        <div class="columns large-5 strings">
            <h4 class="subheader"><?= __('Suoritetut kurssit') ?></h4>
            <?php if (!empty($student->courses)): ?>
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?= __('Nimi') ?></th>
                            <th><?= __('Opintopisteet') ?></th>
                            <th><?= __('Suoritettu') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student->courses as $course): ?>
                            <?php if (isset($course->_joinData->finishing_date)): ?>
                                <tr>
                                    <td><?= $course->name ?></td>
                                    <td><?= $course->credits ?></td>
                                    <td><?= $course->_joinData->finishing_date->format('d.m.Y') ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <div class="columns large-6 strings end">
            <h4 class="subheader"><?= __('Suorittamattomat, mutta aiotut kurssit') ?></h4>
            <?php if (!empty($student->courses)): ?>
                <table cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th><?= __('Nimi') ?></th>
                        <th><?= __('Opintopisteet') ?></th>
                        <th><?= __('Aiottu suoritus aika') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($student->courses as $course): ?>
                        <?php if (isset($course->_joinData->finishing_date) == false): ?>
                            <tr>
                                <td><?= $course->name ?></td>
                                <td><?= $course->credits ?></td>
                                <td><?= $course->_joinData->planned_semester ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
