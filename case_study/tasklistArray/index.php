<?php



//carico le dipendenze
require "./lib/JSONReader.php";
require "./lib/searchFuntions.php";

//Model JSONReader(la parte che gestisce i dati della applicazione, por ejemplo una operacion)

$taskList = JSONReader('./dataset/TaskList.json');
//controller $data = JSONReader() (es el tramite entre el modelo y la vista, por ejemplo presionar la tecla +)

if(isset($_GET['searchText']))
{
    $searchText = trim(filter_var($_GET['searchText'] ,FILTER_SANITIZE_STRING));
    $taskList = array_filter($taskList,searchText($searchText));
} else {
    $searchText = '';
}


?>

<!-- view (vista) visualizzazione / intercetta azione degli utenti-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <title>Task list</title>
</head>
<body>
    <form action="index.php">
        <input type="text"  value="<?= $searchText ?>" name="searchText" >

        <button type="submit">cerca</button>
    </form>
    <ul>
        <?php
        foreach ($taskList as $key => $task) {
            
            $status = $task['status'];
            $taskName = $task['taskName'];

        ?>

      
        <li class="tasklist-item tasklist-item-<?= $status ?>">
             <?=$taskName ?>
             <b> <?= $status ?></b>
        </li> 


        <?php } ?>
        <!--
        <li class="tasklist-item task-list-item-done">uova <b>done</b></li>
        <li class="tasklist-item task-list-item-todo">farina <b>todo</b></li>
        -->
    </ul>
</body>
</html>


