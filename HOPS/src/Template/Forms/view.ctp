<div class="actions columns large-2 medium-3">
    <h3><?= __('Toiminnot') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Näytä oppilaan tiedot'), ['controller' => 'Students', 'action' => 'view', $form->student->user_id]) ?> </li>
    </ul>
</div>
<div class="forms view large-10 medium-9 columns">
    <h2><?= __('HOPS') ?></h2>
    <div class="row">
        <div class="large-5 medium-5 columns strings">
            <h6 class="subheader"><?= __('Opiskelija') ?></h6>
            <p><?= $this->Html->link($form->student->user->name, ['controller' => 'Students', 'action' => 'view', $form->student->user_id])  ?></p>

            <h6 class="subheader"><?= __('Opiskelijanumero') ?></h6>
            <p><?= $form->student->student_number ?></p>

            <h6 class="subheader"><?= __('Vuosikurssi') ?></h6>
            <p><?= $form->student->nth_year ?></p>
        </div>

        <div class="large-5 medium-5 columns strings end">
            <h6 class="subheader"><?= __('Lukuvuosi') ?></h6>
            <p><?= $form->semester ?></p>

            <h6 class="subheader"><?= __('Palautusaika') ?></h6>
            <p><?= $form->time ?></p>
        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Työskentely lukuvuoden aikana') ?></h6>
            <?php if ($form->wors): ?>
                <p class="suheader"><?= __('Aion työskennellä {0} tuntia viikossa lukuvuoden aikana koska', $form->working_hours) ?></p>
            <?php else: ?>
                <p class="suheader"><?= __('En aio työskennellä lukuvuoden aikana koska') ?></p>
            <?php endif; ?>

            <?= $this->Text->autoParagraph(h(   $form->working_reason)); ?>

        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Syyslukukaudella aion suorittaa seuraavat kurssit') ?></h6>

            <table>
                <thead>
                    <tr>
                        <th><?= __('Kurssin nimi') ?></th>
                        <th class="large-3"><?= __('Opintopisteet') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autumnCourses as $course): ?>
                        <tr>
                            <td><?= $course->name ?></td>
                            <td><?= $course->credits ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Kevätlukukaudella aion suorittaa seuraavat kurssit') ?></h6>

            <table>
                <thead>
                <tr>
                    <th><?= __('Kurssin nimi') ?></th>
                    <th class="large-3"><?= __('Opintopisteet') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($springCourses as $course): ?>
                    <tr>
                        <td><?= $course->name ?></td>
                        <td><?= $course->credits ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Oman alani kiinnostavat aihealueet') ?></h6>
            <?= $this->Text->autoParagraph(h($form->interest)); ?>

        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Muiden alojen kiinnostavat aihealuuet') ?></h6>
            <?= $this->Text->autoParagraph(h($form->secondary_interest)); ?>

        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Last Year Positive') ?></h6>
            <?= $this->Text->autoParagraph(h($form->last_year_positive)); ?>

        </div>
    </div>

    <div class="row texts">
        <div class="columns strings large-9 medium-12">
            <h6 class="subheader"><?= __('Last Year Negative') ?></h6>
            <?= $this->Text->autoParagraph(h($form->last_year_negative)); ?>

        </div>
    </div>
</div>
