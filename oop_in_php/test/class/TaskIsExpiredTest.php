<?php
require './vendor/testTools/testTool.php';
require './class/Task.php';

$dataset = [
    ['2021-03-23',true,'task scaduta ieri'],
    ['2021-03-24',false,'task di oggi'],
    ['2021-03-24',false,'task che scade domani'],
];

foreach ($dataset as $testCase){
    //$inputDate = $testCase[0]
    //$expected = $testCase[1]
    //$description = $testCase[2]
    list($inputDate,$expected,$descrption)=$testCase;

    $task = new Task();
    


}