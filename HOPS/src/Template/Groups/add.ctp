<!-- Make sure css and js are loaded early on, so they won't affect the rendering of the table -->
<link rel="stylesheet" href="/css/jquery.tablesorter/theme.default.css">
<script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tutors'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tutor'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="groups form large-10 medium-9 columns">
    <?= $this->Form->create($group); ?>
    <fieldset>
        <legend><?= __('Luo uusi ryhmä') ?></legend>
        <?=
            $this->Form->input('program_structure_id', [
                'options' => $programs,
                'label' => __('Minkä opinto-ohjelman opiskelijoita tämä ryhmä edustaa?')
            ])
        ?>
        <?=
            $this->Form->input('tutor_id', [
                'options' => $tutors,
                'label' => __('Kuka on ryhmästä vastaava opettajatuutori?')
            ])
        ?>
        <?=
            $this->Form->input('year', [
                'label' => __('Minä vuonna ryhmä on aloittanut? (Syyslukukausi)'),
                'type' => 'year',
                'minYear' => 2012,
                'maxYear' => date('Y')
            ])
        ?>

        <hr>
        <p>
            <?= __('Lisää opiskelija ryhmään klikkaamalla alempana olevan listan riviä.<br>
Poista opiskelija klikkaamalla riviä alla olevan listan riviä.') ?>
        </p>
        <fieldset id="selectedStudents">
            <legend><?= __('Ryhmään kuuluvat opiskelijat') ?></legend>
        </fieldset>
        <h6><b><?= __('Opiskeljat, jotka eivät vielä kuulu mihinkään ryhmään') ?></b></h6>
        <table cellpadding="0" cellspacing="0" id="studentList" class="tablesorter">
            <thead>
                <tr>
                    <th class="large-2"><?= __('Opiskelijanumero') ?></th>
                    <th class="large-3"><?= __('Nimi') ?></th>
                    <th>                <?= __('Opinto-ohjelma') ?></th>
                    <th class="large-2"><?= __('Aloitusvuosi') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row => $student): ?>
                    <tr data-user-id="<?= $student->user_id ?>" data-row-id="<?= $row ?>">
                        <td><?= $student->studentNumber ?></td>
                        <td><?= $student->user->name ?></td>
                        <td><?= $student->program_structure->name ?></td>
                        <td><?= $student->entry_year ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Luo')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    var studentList = $('#studentList');
    var selectedStudents = $('#selectedStudents');

    studentList.tablesorter({
        sortList: [[1,1]]
    });

    studentList.find('tbody tr').on('click', function() {
        var row = $(this);
        var rowIndex = row.data('row-id');

        var userID = row.data('user-id');

        var inputID = "students[" + rowIndex + "][user_id]";
        var label = "(" + row.children('td:nth-child(1)').text() + ") " + row.children('td:nth-child(2)').text();

        var contentDiv = $("<div class='selectedStudent' data-row-id='" + rowIndex + "'></div>");
        contentDiv.append("<label for='" + inputID + "'>" + label + "</label>");
        contentDiv.append("<input name='" + inputID + "' type='hidden' value='" + userID + "'>");
        selectedStudents.append(contentDiv);

        row.hide();
    });

    selectedStudents.on('click', '.selectedStudent', function() {
        var row = $(this);
        var rowIndex = row.data('row-id');
        var tableRow = studentList.find("tr[data-row-id='" + rowIndex + "']");

        tableRow.show();
        row.remove();
    });

    selectedStudents.on('mouseenter mouseleave', '.selectedStudent', function() {
        $(this).toggleClass('errorbg');
    });
    studentList.find('tbody td').hover(function() {
        $(this).parent().children().css('background-color', 'lime');
    }, function() {
        $(this).parent().children().css('background-color', '');
    });
</script>

