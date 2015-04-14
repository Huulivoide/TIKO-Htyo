<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $tutor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $tutor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tutor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Access Levels'), ['controller' => 'AccessLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Level'), ['controller' => 'AccessLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
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
        </div>
    </div>

    <div class="row large-10 medium-9">
        <h4 class="subheader"><?= __('Tuutorointiryhmät') ?></h4>
        <ul>
            <?php foreach ($groups as $group): ?>
                <li>
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
                            $this->Html->link($student->user->id, [
                                'controller' => 'Users',
                                'action' => 'view',
                                $student->user->id
                            ])
                            ?>
                        </td>
                        <td>
                            <?=
                                $this->Html->link($student->user->name, [
                                    'controller' => 'Users',
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
