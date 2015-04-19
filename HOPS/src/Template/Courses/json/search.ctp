<?php

$results = [];

foreach ($courses as $course)
    $results[] = ['label' => $course->name, 'data' => $course->id];

echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
