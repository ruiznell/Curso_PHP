<?php
/**
 * Funzione di ordine superiore: è una funzione che restituisce una funzione
 * Introduzione Programmazione Funzionale - dichiarativo
 */
function searchText($searchText){

    // $searchText : locale 
    // searchText es una variable local dentro de la funcion externa
    // per fare il modo che $searchText sia visibile (ambito) all'interno della funzione anonima
    // devo usare "use"

    return function ($taskItem) use ($searchText) {

        //print_r($taskItem['taskName']);
        //echo "sto cercando $searchText";
        
        $result = strpos($taskItem['taskName'], $searchText) !==false;
        return $result;

        //var_dump ($result);
        //print_r($searchText);
        //print_r($taskItem);

    };
     // se coloca el punto y como (;) despues de la llave porque la funcion funciona como una variable, ejemplo  
     // return 10 ;
}