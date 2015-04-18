<div class="actions columns large-2 medium-3">
    <h3><?= __('Toiminnot') ?></h3>
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
            $this->Html->link(__('Näytä ryhmä'), [
                'controller' => 'Groups',
                'action' => 'view',
                $group->id
            ])
            ?>
        </li>
    </ul>
</div>
<div class="groups form large-10 medium-9 columns">
    <?= $this->Form->create($group, ['type' => 'post']); ?>
    <fieldset>
        <legend><?= __('Lähetä viesti kaikille ryhmäläisille') ?></legend>
        <?=
        $this->Form->input('subject', [
            'required' => true,
            'type' => 'string',
            'label' => __('Viestin otsikko')
        ])
        ?>
        <p>
            <?php
                echo __('Vastaanottajat: ');
                $first = true;
                foreach ($group->students as $student)
                {
                    if ($first)
                        $first = false;
                    else
                        echo ', ';
                    echo $this->Text->autoLinkEmails($student->user->email);
                }
            ?>
        </p>
        <?= $this->Form->input('message', ['label' => __('Viestin sisältö')]) ?>
    </fieldset>
    <?= $this->Form->button(__('Lähetä')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="/js/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message', {
        removePlugins: "image,link,stylescombo,about,sourcearea,maximize,specialchar,elementspath",
        scayt_autoStartup: true,
        scayt_sLang: "<?= \Cake\I18n\I18n::locale() ?>"
    });
</script>
