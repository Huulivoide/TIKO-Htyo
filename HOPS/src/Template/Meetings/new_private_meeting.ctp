<script src="/js/ckeditor/ckeditor.js"></script>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki palaverit'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Kaikki oppilaat'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="meetings form large-8 columns">
    <?= $this->Form->create($meeting); ?>
    <fieldset>
        <legend><?= __('Raportoi henkilökohtainen palveri oppilaan {0} kanssa.', $student->name) ?></legend>
        <?=
            $this->Form->input('date', [
                'label' => _('Milloin palveri pidettiin?'),
                'monthNames' => false,
                'minYear' => 2012,
                'maxYear' => \Cake\I18n\Time::now()->year
            ])
        ?>
        <?= $this->Form->input('report', ['label' => __('Mitä asioita palaverissa käsiteltiin?')]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div class="columns">
    <!-- Just to make sure the fildset doesn't float to the right. -->
</div>

<script>
    CKEDITOR.replace('report', {
        removePlugins: "image,link,stylescombo,about,sourcearea,maximize,specialchar,elementspath",
        scayt_autoStartup: true,
        scayt_sLang: "<?= \Cake\I18n\I18n::locale() ?>"
    });
</script>
