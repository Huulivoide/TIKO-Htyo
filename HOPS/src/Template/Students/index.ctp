<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaikki tutorit'), ['controller' => 'Users', 'action' => 'listTutors']) ?> </li>
        <li><?= $this->Html->link(__('Kaikki ryhmät'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="students index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Nimi') ?></th>
            <th><?= $this->Paginator->sort('Aloitusvuosi') ?></th>
            <th><?= $this->Paginator->sort('Tutor') ?></th>
            <th><?= $this->Paginator->sort('Ryhmä') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?= $student->has('user') ? $this->Html->link($student->user->name, ['controller' => 'Students', 'action' => 'view', $student->user->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($student->entry_year) ?></td>
            <td>
                <?= $student->has('tutor') ? $this->Html->link($student->tutor->name, ['controller' => 'Users', 'action' => 'viewTutor', $student->tutor->id]) : '' ?>
            </td>
            <td>
                <?= $student->has('group') ? $this->Html->link($student->group->name, ['controller' => 'Groups', 'action' => 'view', $student->group->id]) : '' ?>
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
