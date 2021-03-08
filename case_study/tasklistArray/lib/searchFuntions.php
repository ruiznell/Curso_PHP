<?php
/**
 * funzione di ordine superiore: è una funzione che restituisce una funzione
 * introduzione a la programazione funzionale - declarativa
 */
function searchText($searchText){

    // searchText es una variable locale dentro de la funcion externa
    // per fare in modo que serachText sia visibile (ambito) all'interno della funzione anonima 

    //devo usare "use"
    return function ($taskItem) use ($searchText) {

        //print_r($taskItem['taskName']);
        //echo "sto cercando $searchText";
        
        $result = strpos($taskItem['taskName'], $searchText) !==false;
        return $result;

        //var_dump ($result);
        //print_r($searchText);
        //print_r($taskItem);

    };
}