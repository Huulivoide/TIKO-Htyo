<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki kurssit'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="courses form large-10 medium-9 columns">
    <?= $this->Form->create($course); ?>
    <fieldset>
        <legend><?= __('Lisää uusi kurssi') ?></legend>
        <?php
            echo $this->Form->input('name', ['type' => 'string', 'label' => __('Kurssin nimi')]);
            echo $this->Form->input('year', [
                'label' => __('Minä vuonna kurssi on järjesttetty ensimmäisen kerran kyseisellä op-määrällä.')
            ]);
            echo $this->Form->input('credits', ['label' => __('Opintopisteet')]);
            echo $this->Form->input('course_types._ids', [
                'options' => $courseTypes,
                'label' => __('Mitkä alla olevista tageistä liittyvät kurssiin?')
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
</div>
