<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Luo kurssi'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="courses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Nimi') ?></th>
            <th><?= $this->Paginator->sort('Vuosi') ?></th>
            <th><?= $this->Paginator->sort('Opintopisteet') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $course): ?>
        <tr>
            <td><?= $this->Html->link($course->name, ['action' => 'view', $course->id]) ?></td>
            <td><?= $this->Number->format($course->year) ?></td>
            <td><?= $this->Number->format($course->credits) ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
