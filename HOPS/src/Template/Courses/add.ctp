<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Course Types'), ['controller' => 'CourseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Type'), ['controller' => 'CourseTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Program Structures'), ['controller' => 'ProgramStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Structure'), ['controller' => 'ProgramStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
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
