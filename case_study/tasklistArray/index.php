<?php

print_r($_GET);

//carico le dipendenze
require "./lib/JSONReader.php";
require "./lib/searchFuntions.php";

//Model JSONReader(la parte che gestisce i dati della applicazione, por ejemplo una operacion de suma)

$taskList = JSONReader('./dataset/TaskList.json');
//controller $data = JSONReader() (es el tramite entre el modelo y la vista, por ejemplo presionar la tecla +)

if(isset($_GET['searchText']) && trim($_GET['searchText']) !== '')
{
    $searchText = trim(filter_var($_GET['searchText'] ,FILTER_SANITIZE_STRING));
    //$searchStatus = trim(filter_var($_GET['searchStatus'] ,FILTER_SANITIZE_STRING));
    //var_dump($searchText, $_GET['searchText']);
    //die();
    $taskList = array_filter($taskList,searchText($searchText));
    //$taskList = array_filter($taskList,searchStatus($status));
    //$taskList = searchText($searchText,$taskList );
} else {
    $searchText = '';
}

if(isset($_GET['searchStatus']) && trim($_GET['searchStatus']) !== '')
{
    $status = trim(filter_var($_GET['searchStatus'] ,FILTER_SANITIZE_STRING));
    //$searchStatus = trim(filter_var($_GET['searchStatus'] ,FILTER_SANITIZE_STRING));
    //var_dump($searchText, $_GET['searchText']);
    //die();
    $taskList = array_filter($taskList,searchStatus($status));
    //$taskList = array_filter($taskList,searchStatus($status));
    //$taskList = searchText($searchText,$taskList );
} else {
    $status = '';
}

?>

<!-- view (vista) visualizzazione / intercetta azioni dell'utente-->
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

        <!--<input type="text"  value="<?= $status ?>" name="searchStatus" >
        <button type="submit">cerca</button>-->
        <div id="status">
        
        <input type="radio"  name='searchStatus'  value="todo" id="todo" <?php if ($status == "todo") echo "checked";?>>
        <label for="todo">da fare</label>

        <input type="radio" name='searchStatus'  value="progress" id="progress" <?php if ($status == "progress") echo "checked";?> >
        <label for="progress">stai facendo</label>
        
        <input type="radio" name='searchStatus'  value="done" id="done" <?php if ($status == "done") echo "checked";?> >
        <label for="done">fatti</label>       

        <input type="radio" name='taskList'  value="all" id="all" <?php if ($taskList == "all") echo "checked";?> >
        <label for="all">visualizza tutti</label>
        </div>
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


