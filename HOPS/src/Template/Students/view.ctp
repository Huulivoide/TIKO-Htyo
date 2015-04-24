<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(__('Poista oppilas'), ['action' => 'delete', $student->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('Kaikki oppilaat'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="students view large-10 medium-9 columns">
    <h2><?= h($student->user->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Tutor') ?></h6>
            <p><?= $student->has('tutor') ? $this->Html->link($student->tutor->name, ['controller' => 'Users', 'action' => 'viewTutor', $student->tutor->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Tutkinto-ohjelma') ?></h6>
            <p><?= $student->program_structure->name ?></p>
            <h6 class="subheader"><?= __('Ryhmä') ?></h6>
            <p><?= $student->has('group') ? $this->Html->link($student->group->name, ['controller' => 'Groups', 'action' => 'view', $student->group->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Aloitusvuosi') ?></h6>
            <p><?= $this->Number->format($student->entry_year) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Forms') ?></h4>
    <?php if (!empty($student->forms)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Student Id') ?></th>
            <th><?= __('Time') ?></th>
            <th><?= __('Works') ?></th>
            <th><?= __('Weekly Hours') ?></th>
            <th><?= __('Working Reason') ?></th>
            <th><?= __('Interest') ?></th>
            <th><?= __('Secondary Interest') ?></th>
            <th><?= __('Last Year Positive') ?></th>
            <th><?= __('Last Year Negative') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($student->forms as $forms): ?>
        <tr>
            <td><?= h($forms->id) ?></td>
            <td><?= h($forms->student_id) ?></td>
            <td><?= h($forms->time) ?></td>
            <td><?= h($forms->works) ?></td>
            <td><?= h($forms->weekly_hours) ?></td>
            <td><?= h($forms->working_reason) ?></td>
            <td><?= h($forms->interest) ?></td>
            <td><?= h($forms->secondary_interest) ?></td>
            <td><?= h($forms->last_year_positive) ?></td>
            <td><?= h($forms->last_year_negative) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Forms', 'action' => 'view', $forms->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Forms', 'action' => 'edit', $forms->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Forms', 'action' => 'delete', $forms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forms->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Courses') ?></h4>
    <?php if (!empty($student->courses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Year') ?></th>
            <th><?= __('Credits') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($student->courses as $courses): ?>
        <tr>
            <td><?= h($courses->id) ?></td>
            <td><?= h($courses->name) ?></td>
            <td><?= h($courses->year) ?></td>
            <td><?= h($courses->credits) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courses->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Meetings') ?></h4>
    <?php if (!empty($student->meetings)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Group Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Report') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($student->meetings as $meetings): ?>
        <tr>
            <td><?= h($meetings->id) ?></td>
            <td><?= h($meetings->date) ?></td>
            <td><?= h($meetings->group_id) ?></td>
            <td><?= h($meetings->user_id) ?></td>
            <td><?= h($meetings->report) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Meetings', 'action' => 'view', $meetings->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Meetings', 'action' => 'edit', $meetings->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meetings', 'action' => 'delete', $meetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetings->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
