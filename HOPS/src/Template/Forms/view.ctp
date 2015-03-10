<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Form'), ['action' => 'edit', $form->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Form'), ['action' => 'delete', $form->id], ['confirm' => __('Are you sure you want to delete # {0}?', $form->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses Students'), ['controller' => 'CoursesStudents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Student'), ['controller' => 'CoursesStudents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="forms view large-10 medium-9 columns">
    <h2><?= h($form->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p><?= $form->has('student') ? $this->Html->link($form->student->user_id, ['controller' => 'Students', 'action' => 'view', $form->student->user_id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($form->id) ?></p>
            <h6 class="subheader"><?= __('Weekly Hours') ?></h6>
            <p><?= $this->Number->format($form->weekly_hours) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Time') ?></h6>
            <p><?= h($form->time) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Works') ?></h6>
            <p><?= $form->works ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Working Reason') ?></h6>
            <?= $this->Text->autoParagraph(h($form->working_reason)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Interest') ?></h6>
            <?= $this->Text->autoParagraph(h($form->interest)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Secondary Interest') ?></h6>
            <?= $this->Text->autoParagraph(h($form->secondary_interest)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Last Year Positive') ?></h6>
            <?= $this->Text->autoParagraph(h($form->last_year_positive)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Last Year Negative') ?></h6>
            <?= $this->Text->autoParagraph(h($form->last_year_negative)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related CoursesStudents') ?></h4>
    <?php if (!empty($form->courses_students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Course Id') ?></th>
            <th><?= __('Form Id') ?></th>
            <th><?= __('Student Id') ?></th>
            <th><?= __('Planned Finishing Date') ?></th>
            <th><?= __('Finishing Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($form->courses_students as $coursesStudents): ?>
        <tr>
            <td><?= h($coursesStudents->course_id) ?></td>
            <td><?= h($coursesStudents->form_id) ?></td>
            <td><?= h($coursesStudents->student_id) ?></td>
            <td><?= h($coursesStudents->planned_finishing_date) ?></td>
            <td><?= h($coursesStudents->finishing_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'CoursesStudents', 'action' => 'view', $coursesStudents->course_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'CoursesStudents', 'action' => 'edit', $coursesStudents->course_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CoursesStudents', 'action' => 'delete', $coursesStudents->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesStudents->course_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
