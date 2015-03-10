<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Program Structure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Program Requirements'), ['controller' => 'ProgramRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program Requirement'), ['controller' => 'ProgramRequirements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="programStructures index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('year') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($programStructures as $programStructure): ?>
        <tr>
            <td><?= $this->Number->format($programStructure->id) ?></td>
            <td><?= $this->Number->format($programStructure->year) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $programStructure->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $programStructure->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $programStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programStructure->id)]) ?>
            </td>
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
