<?php
require './vendor/testTools/testTool.php';
require './class/Task.php';

$dataset = [
    ['2021-03-29',true,'task scaduta ieri'],
    ['2021-03-30',false,'task di oggi'],
    ['2021-03-31',false,'task che scade domani'],
];

foreach ($dataset as $testCase){
    //$inputDate = $testCase[0];
    //$expected = $testCase[1];
    //$description = $testCase[2];
    //estas tres lineas son lo mismo que la linea de abajo
    list($inputDate,$expected,$description)=$testCase;

    $task = new Task();
    $task->taskName = 'ciccio';
    //echo$inputDate = $inputDate;
    $task->expirationDate = $inputDate;
    $task->status = 'done';

    assertEquals($expected,$task->isExpired(), $description);
}