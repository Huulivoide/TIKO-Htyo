<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(__('Poista kurssi'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('Kaikki kurssit'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="courses view large-10 medium-9 columns">
    <h2><?= h($course->name) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Alkamisvuosi') ?></h6>
            <p><?= $this->Number->format($course->year) ?></p>
            <h6 class="subheader"><?= __('Opintopisteet') ?></h6>
            <p><?= $this->Number->format($course->credits) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($course->name)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Liittyvät kurssityypit') ?></h4>
    <?php if (!empty($course->course_types)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Nimi') ?></th>
        </tr>
        <?php foreach ($course->course_types as $courseTypes): ?>
        <tr>
            <td><?= h($courseTypes->name) ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Liittyvät tutkinto-ohjelmat') ?></h4>
    <?php if (!empty($course->program_structures)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Nimi') ?></th>
        </tr>
        <?php foreach ($course->program_structures as $programStructures): ?>
        <tr>
            <td><?= h($programStructures->name) ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
