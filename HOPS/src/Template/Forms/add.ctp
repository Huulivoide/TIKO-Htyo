<div class="forms form large-9 medium-12 large-centered medium-centered columns">
    <?= $this->Form->create($form); ?>
    <fieldset>
        <legend><?= __('HOPS Lomake lukuvudelle {0}', $currentSemester) ?></legend>

        <!-- Todo change back to > 1 -->
        <?php if ($student->nthYear >= 1): ?>
            <fieldset>
                <legend><?= __('Aikaisemmat opinnot') ?></legend>
                <?php if (count($student->un_finished_courses) > 0): ?>
                    <p>
                        <?=
                            __('Olet aiemmissa HOPS:eissasi kertonut aikovasi suorittaa alla olevat kurssit.<br>' .
                               'Merkitse niistä suorittamasi kurssit, ilmoittamalla suorituksen päivämäärä.')
                        ?>
                    </p>

                    <table>
                        <thead>
                            <tr>
                                <th><?= __('Kurssin nimi') ?></th>
                                <th><?= __('Suoritettu') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($student->un_finished_courses as  $index=>$course): ?>
                                <tr  class="unfinished-row">
                                    <td><?= $course->name ?></td>
                                    <td>
                                        <?=
                                            $this->Form->hidden("unfinished.$index.course_id", [
                                                'value' => $course->id
                                            ])
                                        ?>
                                        <?=
                                            $this->Form->input("unfinished.$index.finishing_date", [
                                                'label' => false,
                                                'class' => 'datepicker'
                                            ])
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                    <p>
                        <?=
                        __('Jos olet suorittanut muita kursseja lukuvuonna <b>{0}</b> listaa ne alle.', $lastSemester)
                        ?>
                    </p>
                <?php else: ?>
                    <p>
                        <?=
                        __('Listaa kaikki lukuvuonna <b>{0}</b> suorittamasi kurssit alle.', $lastSemester)
                        ?>
                    </p>
                <?php endif; ?>


                <div id="lastSemesterCoursesList">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 0%;"><!-- for id --></th>
                                <th><?= __('Kurssin nimi') ?></th>
                                <th><?= __('Suoritettu') ?></th>
                            </tr>
                        </thead>
                        <tbody id="lastSemesterCoursesTbody">
                        </tbody>
                    </table>
                    <img class="addCourseToTable" src="/img/plus.png" alt="Add new course" style="cursor: pointer">
                </div>
            </fieldset>
        <?php endif; ?>

        <fieldset>
            <legend><?= __('Mitä kursseja aiot suorittaa syyslukukaudella?') ?></legend>
            <div id="autumnSemesterCoursesList">
                <img class="addAutumnCourse" src="/img/plus.png" alt="Add new course" style="cursor: pointer">
            </div>
        </fieldset>

        <fieldset>
            <legend><?= __('Mitä kursseja aiot suorittaa kevätlukukaudella?') ?></legend>
            <p>
                Kevään valintasi luonnollisesti tarkentuvat, kun kevään tarkempi opetusohjelma on käytettävissä. Olisi
                kuitenkin erittäin hyvä, jos jo ennen koko lukuvuoden alkua Sinulla olisi suunnitelma myös kevääksi.
                Opettajatuutorisi ottaa Sinuun yhteyttä lukuvuoden aikana ja voit tällöin tarkentaa suunnitelmaasi. Laitosten
                verkkosivuilta löytyy tietoa kuluvan vuoden kevään opetuksesta, jota voit käyttää hyväksesi suunnittelussasi.
            </p>
            <div id="springSemesterCoursesList">
                <img class="addSpringCourse" src="/img/plus.png" alt="Add new course" style="cursor: pointer">
            </div>
        </fieldset>

        <fieldset>
            <legend><?= __('Työskentely lukuvuoden aikana') ?></legend>
            <?php
                echo $this->Form->input('works', [
                    'type' => 'radio',
                    'required' => true,
                    'options' => ['true' => __('Kyllä'), 'false' => __('En')],
                    'label' => __('Aiotko työskennellä lukukauden aikana?')
                ]);
                echo $this->Form->input('weekly_hours', [
                    'value' => 0,
                    'label' => __('Kuinka monta tuntia viikossa aiot keskimäärin työskennellä?')
                ]);
                echo $this->Form->input('working_reason', [
                    'rows' => 3
                ]);
            ?>
        </fieldset>

        <fieldset>
            <legend><?= __('Kiinnostuksen kohteet') ?></legend>
            <?php
                echo $this->Form->input('interest', [
                    'label' => __('Mistä pääaineesi aihealueista olet eritoten kiinnostunut?'),
                    'rows' => 3
                ]);
                echo $this->Form->input('secondary_interest', [
                    'label' => __('Mistä muista yliopiston tarjoamista opinnoista olet kiinnostunt?'),
                    'rows' => 3
                ]);
            ?>
        </fieldset>
        <fieldset>
            <legend><?= __('Katsaus viime lukukauteen') ?></legend>
            <?php
                echo $this->Form->input('last_year_positive', [
                    'label' => __('Mitkä asiat koit positiivisiksi viime vuonna? Miksi?'),
                    'rows' => 3
                ]);
                echo $this->Form->input('last_year_negative', [
                    'label' => __('Mitkä asiat koit negatiivisiksi viime vuonna? Miksi?'),
                    'rows' => 3
                ]);
            ?>
        </fieldset>
    </fieldset>
    <?= $this->Form->button(__('Tallenna')) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('flick/jquery-ui.min') ?>
<?= $this->Html->css('flick/theme') ?>
<script src="/js/jquery-ui.min.js" type="application/javascript"></script>
<script>
    var workingReasonInput = $('#working-reason');
    var workingReasonDiv = workingReasonInput.parent();
    var workingReasonLabel = $("label[for='" + workingReasonInput.attr('id') + "']");
    var weeklyHoursInput = $('#weekly-hours');
    var weeklyHoursDiv = weeklyHoursInput.parent();
    workingReasonDiv.hide();
    weeklyHoursDiv.hide();

    $('#works-true').on('click', function() {
        if ($(this).is(':checked'))
        {
            if (weeklyHoursDiv.is(':hidden'))
                weeklyHoursDiv.show('slow');

            workingReasonLabel.text('<?= __('Miksi aiot työskennellä ja millaista työtä aiot tehdä?') ?>');
            if (workingReasonDiv.is(':hidden'))
                workingReasonDiv.show('slow');
        }
    });

    $('#works-false').on('click', function() {
        if ($(this).is(':checked'))
        {
            weeklyHoursInput.val(0);
            if (weeklyHoursDiv.is(':visible'))
                weeklyHoursDiv.hide('slow');

            workingReasonLabel.text('<?= __('Mikset aio työskennellä?') ?>');
            if (workingReasonDiv.is(':hidden'))
                workingReasonDiv.show('slow');
        }
    });

    var datePickerSettings = {
        minDate: new Date(2012, 1, 1),
        maxDate: Date.now(),
        dateFormat: 'd.m.yy',
        firstDay: 1,
        dayNames: ['Sunnuntai', 'Maanantai', 'Tiistai', 'Keskiviikko', 'Torstai', 'Perjantai', 'Lauantai'],
        dayNamesMin: ['Su', 'Ma', 'Ti', 'Ke', 'To', 'Pe', 'La'],
        dayNamesShort: ['Su', 'Ma', 'Ti', 'Ke', 'To', 'Pe', 'La'],
        monthNames: ['Tammikuu', 'Helmikuu', 'Maaliskuu', 'Huhtikuu', 'Toukokuu', 'Kesäkuu',
            'Heinäkuu', 'Elokuu', 'Syyskuu', 'Lokakuu', 'Marraskuu', 'Joulukuu'],
        montNamesShort: ['Tammi', 'Helmi', 'Maalis', 'Huhti', 'Touko', 'Kesä',
            'Heinä', 'Elo', 'Syys', 'Loka', 'Marras', 'Joulu']
    };

    $('.datepicker').datepicker(datePickerSettings);

    $('.unfinished-row .datepicker').on('change', function (){
        if ($(this).val())
            $(this).parents('tr').css('background-color', 'lime');
    });

    // TODO unify the following 3 functions, 99% of them is same code.
    var cache = {};
    var lastSemesterCoursesTbody = $('#lastSemesterCoursesTbody');
    $('.addCourseToTable').on('click', function () {
        var row = lastSemesterCoursesTbody.children().length;

        var nameInput = $('<input id="lastSemesterCourses-' + row + '-name" class="course-autocomplete" type="text">');
        var idInput = $('<input id="lastSemesterCourses-' + row + '-id" type="hidden" name="lastSemesterCourses[' + row + '][id]">');
        var dateInput = $('<input id="lastSemesterCourses-' + row + '-date" type="date" name="lastSemesterCourses[' + row + '][date]">');

        nameInput.autocomplete({
            minLength: 3,
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache ) {
                    response( cache[ term ] );
                    return;
                }

                $.getJSON( "/courses/search.json", request, function( data, status, xhr ) {
                    cache[ term ] = data;
                    response( data );
                });
            },
            select: function(event, ui) {
                event.preventDefault();
                this.value = ui.item.label;
                idInput.val(ui.item.value);
            }
        });

        dateInput.datepicker(datePickerSettings);

        var tr = $('<tr></tr>');

        tr.append(idInput.wrap('<td></td>').parent());
        tr.append(nameInput.wrap('<td></td>').parent());
        tr.append(dateInput.wrap('<td></td>').parent());

        lastSemesterCoursesTbody.append(tr);
    });


    $('.addAutumnCourse').on('click', function () {
        var row = $(this).siblings().length;
        if (row > 0)
            row /= 2;
        var nameInput = $('<input id="thisAutumnCourse-' + row + '-name" class="course-autocomplete column large-9 medium-9" type="text">');
        var idInput = $('<input id="thisAutumnCourse-' + row + '-id" type="hidden" name="thisAutumnCourses[' + row + '][id]">');

        nameInput.autocomplete({
            minLength: 3,
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache ) {
                    response( cache[ term ] );
                    return;
                }

                $.getJSON( "/courses/search.json", request, function( data, status, xhr ) {
                    cache[ term ] = data;
                    response( data );
                });
            },
            select: function(event, ui) {
                event.preventDefault();
                this.value = ui.item.label;
                idInput.val(ui.item.value);
            }
        });

        $(this).before(idInput);
        $(this).before(nameInput);
    });


    $('.addSpringCourse').on('click', function () {
        var row = $(this).siblings().length;
        if (row > 0)
            row /= 2;
        var nameInput = $('<input id="thisSpringCourse-' + row + '-name" class="course-autocomplete column large-9 medium-9" type="text">');
        var idInput = $('<input id="thisSpringCourse-' + row + '-id" type="hidden" name="thisSpringCourses[' + row + '][id]">');

        nameInput.autocomplete({
            minLength: 3,
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache ) {
                    response( cache[ term ] );
                    return;
                }

                $.getJSON( "/courses/search.json", request, function( data, status, xhr ) {
                    cache[ term ] = data;
                    response( data );
                });
            },
            select: function(event, ui) {
                event.preventDefault();
                this.value = ui.item.label;
                idInput.val(ui.item.value);
            }
        });

        $(this).before(idInput);
        $(this).before(nameInput);
    });
</script>
